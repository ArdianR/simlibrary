<?php
class Tipekoleksi extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/tipekoleksilist";
		$this->viewdetail = "panelbackend/tipekoleksidetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Tipekoleksi';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Tipekoleksi';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Tipekoleksi';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Tipekoleksi';
		}

		$this->model = new TipekoleksiModel();

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
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'nama', 
				'label'=>'Nama', 
				'rules'=>"required",
			),
		);
	}

}