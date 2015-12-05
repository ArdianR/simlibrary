<?php
class Lokasi extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/lokasilist";
		$this->viewdetail = "panelbackend/lokasidetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Lokasi';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Lokasi';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Lokasi';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Lokasi';
		}

		$this->model = new LokasiModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			''
		);
	}

	protected function Header(){
		return array(
			array(
				'name'=>'kode_lokasi', 
				'label'=>'Kode Lokasi', 
				'width'=>"auto",
				'type'=>"varchar",
			),
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
			'kode_lokasi'=>$this->post['kode_lokasi'],
			'nama'=>$this->post['nama'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'kode_lokasi', 
				'label'=>'Kode Lokasi', 
				'rules'=>"required",
			),
			array(
				'field'=>'nama', 
				'label'=>'Nama', 
				'rules'=>"required",
			),
		);
	}

}