<?php
class Loginas extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/loginaslist";
		$this->viewdetail = "panelbackend/sysuserdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Login As';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Login As';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Login As';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Login As';
		}

		$this->model = new SysUserModel();
		$publicsysgroup = new SysGroupModel();

		$rspublicsysgroup = $publicsysgroup->GArray();

		$publicsysgrouparr = array(''=>'');
		foreach($rspublicsysgroup as $row){
			$publicsysgrouparr[$row['group_id']] = $row['name'];
		}

		$this->data['publicsysgrouparr'] = $publicsysgrouparr;

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			'datepicker'
		);
	}

	protected function Header(){
		$this->_setFilter("is_active = 1");
		return array(
			array(
				'name'=>'username', 
				'label'=>'Username', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'group_id', 
				'label'=>'Group ', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['publicsysgrouparr'],
			),
			array(
				'name'=>'name', 
				'label'=>'Name', 
				'width'=>"auto",
				'type'=>"varchar",
			)
		);
	}

	function _actionIndex($page=1){

		if($this->post['act']=='loginas'){
			$return = $this->auth->LoginAs($this->post['username']);
			if($return['success']){
				URL::Redirect('panelbackend');
			}else{
				$this->SetFlash('err_msg', "Login As Gagal !");
				URL::Redirect("$this->page_ctrl/index");
			}
		}

		parent::_actionIndex($page);
	}

}