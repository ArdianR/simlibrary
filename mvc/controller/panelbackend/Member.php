<?php
class Member extends _adminController{

	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$this->viewlist = "panelbackend/memberlist";
		$this->viewdetail = "panelbackend/memberdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Member';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Member';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Member';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Member';
		}

		$this->model = new MemberModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
	}

	function _actionIndex( $page=1){
		$this->data['header']=array(
			array('name'=>'nama', 'label'=>'Nama', 'width'=>"auto"),
			array('name'=>'alamat', 'label'=>'Alamat', 'width'=>"auto"),
			array('name'=>'no_identitas', 'label'=>'No. ID', 'width'=>"auto"),
			array('name'=>'no_hp', 'label'=>'Hp', 'width'=>"auto"),
			array('name'=>'email', 'label'=>'Email', 'width'=>"auto"),
		);

		$this->data['list']=$this->_getList($page);

		$this->data['page']=$page;

		$param_paging = array(
			'base_url'=>URL::Base("panelbackend/member/index"),
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
				 'field'   => 'alamat',
				 'label'   => 'Alamat',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'no_identitas',
				 'label'   => 'No. Identitas',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'no_identitas',
				 'label'   => 'No. Identitas',
				 'rules'   => 'number'
			  ),
		   array(
				 'field'   => 'no_hp',
				 'label'   => 'No. Hp',
				 'rules'   => 'phone'
			  ),
		   array(
				 'field'   => 'email',
				 'label'   => 'Email',
				 'rules'   => 'email'
			  )
		);

		$validation = new FormValidation($rules);

		if ($validation->run() == FALSE)
		{
			$this->data['err_msg'] = $validation->GetError();
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
			$record['alamat'] = $this->post['alamat'];
			$record['no_identitas'] = $this->post['no_identitas'];
			$record['no_hp'] = $this->post['no_hp'];
			$record['email'] = $this->post['email'];

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
