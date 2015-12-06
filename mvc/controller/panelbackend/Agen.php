<?php
class Agen extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/agenlist";
		$this->viewdetail = "panelbackend/agendetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Agen';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Agen';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Agen';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Agen';
		}

		$this->model = new AgenModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			''
		);
	}

	protected function Header(){
		return array(
			array(
				'name'=>'nama', 
				'label'=>'Nama', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'alamat', 
				'label'=>'Alamat', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'kontak', 
				'label'=>'Kontak', 
				'width'=>"auto",
				'type'=>"decimal",
			),
			array(
				'name'=>'tlp', 
				'label'=>'Tlp', 
				'width'=>"auto",
				'type'=>"decimal",
			),
			array(
				'name'=>'faks', 
				'label'=>'Faks', 
				'width'=>"auto",
				'type'=>"decimal",
			),
			array(
				'name'=>'modified_date', 
				'label'=>'Terakhir Diubah', 
				'width'=>"auto",
				'type'=>"decimal",
			),
		);
	}

	protected function Record(){
		return array(
			'nama'=>$this->post['nama'],
			'alamat'=>$this->post['alamat'],
			'kontak'=>$this->post['kontak'],
			'tlp'=>$this->post['tlp'],
			'faks'=>$this->post['faks'],
			'no_akun'=>$this->post['no_akun'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'nama', 
				'label'=>'Nama', 
				'rules'=>"required",
			),
			array(
				'field'=>'alamat', 
				'label'=>'Alamat', 
				'rules'=>"required",
			),
			array(
				'field'=>'kontak', 
				'label'=>'Kontak', 
				'rules'=>"required",
			),
			array(
				'field'=>'kontak', 
				'label'=>'Kontak', 
				'rules'=>"number",
			),
			array(
				'field'=>'tlp', 
				'label'=>'Tlp', 
				'rules'=>"required",
			),
			array(
				'field'=>'tlp', 
				'label'=>'Tlp', 
				'rules'=>"number",
			),
			array(
				'field'=>'faks', 
				'label'=>'Faks', 
				'rules'=>"required",
			),
			array(
				'field'=>'faks', 
				'label'=>'Faks', 
				'rules'=>"number",
			),
			array(
				'field'=>'no_akun', 
				'label'=>'No Akun', 
				'rules'=>"required",
			),
			array(
				'field'=>'no_akun', 
				'label'=>'No Akun', 
				'rules'=>"number",
			),
		);
	}

}