<?php
class Petugas extends _adminController{

	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$this->viewlist = "panelbackend/petugaslist";
		$this->viewdetail = "panelbackend/petugasdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Petugas';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Petugas';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Petugas';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Petugas';
		}

		$this->model = new PetugasModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;

		$this->data['jkarr'] = array(''=>'-pilih-','p'=>'Perempuan','l'=>'Laki-laki');

		$this->Plugin(array('datepicker'));
	}

	function _actionIndex( $page=1){
		$this->data['header']=array(
			array('name'=>'nama', 'label'=>'Nama', 'width'=>"auto"),
			array('name'=>'telp', 'label'=>'Telp.', 'width'=>"auto"),
			array('name'=>'alamat', 'label'=>'Alamat', 'width'=>"auto"),
		);

		$this->data['list']=$this->_getList($page);

		$this->data['page']=$page;

		$param_paging = array(
			'base_url'=>URL::Base("panelbackend/petugas/index"),
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
	function IsValid($record){
		$rules = array(
		   array(
				 'field'   => 'nama',
				 'label'   => 'Nama',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'jk',
				 'label'   => 'Jenis Kelamin',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'tgl_lahir',
				 'label'   => 'Tgl. Lahir',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'telp',
				 'label'   => 'Telepon',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'alamat',
				 'label'   => 'Alamat',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'username',
				 'label'   => 'Username',
				 'rules'   => 'required'
			  ),
		);

		$validation = new FormValidation($rules);

		if ($validation->run() == FALSE)
		{
			$this->data['err_msg'] = $validation->GetError();
		}

		if($this->post['password']<>$this->post['confirmpassword']){
			$this->data['err_msg'] .= "Konfirmasi password salah";
		}    

		if($this->data['err_msg']){
			$this->data['row'] = $record;
			$this->View($this->viewdetail);
			exit();
		}
	}
	function _actionEdit($id=null){
		if($this->post['act']=='reset'){
			URL::Redirect();
		}

		$this->data['row'] = $this->model->GetByPk($id);
		if (!$this->data['row'] && $id)
			$this->NoData();
		
		## EDIT HERE ##
		if ($this->post['act'] === 'save') {
			$record = array();
			$record['nama'] = $this->post['nama'];
			$record['jk'] = $this->post['jk'];
			$record['tgl_lahir'] = $this->post['tgl_lahir'];
			$record['telp'] = $this->post['telp'];
			$record['alamat'] = $this->post['alamat'];
			$record['username'] = $this->post['username'];

			if($this->post['password']){
				$record['password'] = sha1(md5($this->post['password']));
			}
			
			$this->IsValid($record);
			
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
				
		$this->View($this->viewdetail);
	}
}
