<?php
class SysUser extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/sysuserlist";
		$this->viewdetail = "panelbackend/sysuserdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah User';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit User';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail User';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar User';
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

	public function _actionIndex($page=1){
		if($this->post['act']=='goaksi'){
			$user_id_str = "'".implode("','", $this->post['user'])."'";
			switch ($this->post['jenisaksi']) {
				case 'aktif':
					$return = $this->model->Execute("update public_sys_user set is_active = '1' where user_id in ($user_id_str)");
					break;
				case 'unaktif':
					$return = $this->model->Execute("update public_sys_user set is_active = '0' where user_id in ($user_id_str)");
					break;
			}

			if($return){
				$this->SetFlash('suc_msg', "Data berhasil disimpan");
			}else{
				$this->SetFlash('err_msg', "Data gagal disimpan");
			}
			URL::Redirect($this->page_ctrl);
		}
		parent::_actionIndex($page);
	}

	protected function Header(){
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
			),
			array(
				'name'=>'last_ip', 
				'label'=>'Last Ip', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'last_login', 
				'label'=>'Last Login', 
				'width'=>"auto",
				'type'=>"datetime",
			),
			array(
				'name'=>'is_active', 
				'label'=>'Active', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>array(''=>'','0'=>'Tidak','1'=>'Iya'),
			),
		);
	}

	protected function Record(){
		return array(
			'username'=>$this->post['username'],
			'group_id'=>$this->post['group_id'],
			'name'=>$this->post['name'],
			'last_ip'=>$this->post['last_ip'],
			'last_login'=>$this->post['last_login'],
			'is_active'=>(int)$this->post['is_active'],
			'password'=>sha1(md5($this->post['password'])),
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'group_id', 
				'label'=>'Group ', 
				'rules'=>"number",
			),
		);
	}

}