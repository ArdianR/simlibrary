<?php
class Pinjam extends _adminController{

	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$this->viewlist = "panelbackend/pinjamlist";
		$this->viewdetail = "panelbackend/pinjamdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Pinjam';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Pinjam';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Pinjam';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Pinjam';
		}

		$this->model = new PinjamModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;

		$this->Plugin(array('datepicker','autocomplete'));
	}

	function _actionIndex( $page=1){
		$this->data['header']=array(
			array('name'=>'id_member', 'label'=>'Nama', 'width'=>"auto"),
			array('name'=>'tgl_pinjam', 'label'=>'Tgl. Pinjam', 'type'=>'date'),
			array('name'=>'tgl_kembali', 'label'=>'Tgl. Kembali', 'type'=>'date'),
			array('name'=>'jaminan', 'label'=>'Jaminan', 'width'=>"auto"),
			array('name'=>'kode_jaminan', 'label'=>'Kode Jaminan', 'width'=>"auto"),
		);

		$this->data['list']=$this->_getList($page);

		$this->data['page']=$page;

		$param_paging = array(
			'base_url'=>URL::Base("panelbackend/pinjam/index"),
			'cur_page'=>$page,
			'total_rows'=>$this->data['list']['total'],
			'per_page'=>$this->limit
		);
		$paging = new Pagination($param_paging);

		$this->data['paging']=$paging->create_links();

		$this->data['limit']=$this->limit;
		
		$this->data['limit_arr']=$this->limit_arr;

		$this->View($this->viewlist);
	}

	function _actionEdit($id=null){
		if($this->post['act']=='reset'){
			URL::Redirect();
		}

		$this->data['row'] = $this->model->GetByPk($id);
		$id_member = $this->data['row']['id_member'];

		if (!$this->data['row'] && $id)
			$this->NoData();
		
		## EDIT HERE ##
		if ($this->post['act'] === 'save') {

			$id_member = $record['id_member'] = $this->post['id_member'];
			$record['tgl_pinjam'] = $this->post['tgl_pinjam'];
			$record['tgl_kembali'] = $this->post['tgl_kembali'];
			$record['jaminan'] = $this->post['jaminan'];
			$record['kode_jaminan'] = $this->post['kode_jaminan'];
			
            $this->setLogRecord($record,$id);

			if ($id) {
				$return = $this->model->Update($record, "$this->pk = $id");
				if ($return) {
					$this->SetFlash('suc_msg', $return['success']);
					URL::Redirect("$this->page_ctrl/edit/$id");					
				}
				else {
					$this->data['row'] = $record;
					$this->data['err_msg'] = "Data gagal diubah";
				}
			}
			else {
				$return = $this->model->Insert($record);
				if ($return) {
					$this->SetFlash('suc_msg', $return['success']);
					URL::Redirect("$this->page_ctrl/edit/".$return['data'][$this->pk]);					
				}
				else {
					$this->data['row'] = $record;
					$this->data['err_msg'] = "Data gagal disimpan";
				}
			}
		}
			
		if($id_member){
			$modelmember = new MemberModel();
			$this->data['row']['member'] = array('id'=>$id_member,'label'=>$modelmember->GOne("nama","where id_member = '$id_member'"));	
		}
		$this->View($this->viewdetail);
	}

	function _actionDetail( $id=null){		
		$this->data['row'] = $this->model->GetByPk($id);
		if (!$this->data['row'])
			$this->NoData();
        
		$id_member = $this->data['row']['id_member'];
			
		if($id_member){
			$modelmember = new MemberModel();
			$this->data['row']['member'] = array('id'=>$id_member,'label'=>$modelmember->GOne("nama","where id_member = '$id_member'"));	
		}
		
		$this->View($this->viewdetail);		
	}
}
