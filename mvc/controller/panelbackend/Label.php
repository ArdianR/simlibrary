<?php
class Label extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/labellist";
		$this->viewdetail = "panelbackend/labeldetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Label';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Label';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Label';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Label';
		}

		$this->model = new LabelModel();

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
				'name'=>'lampiran_berkas', 
				'label'=>'Lampiran Berkas', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'deskripsi_label', 
				'label'=>'Deskripsi Label', 
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
			'lampiran_berkas'=>$this->post['lampiran_berkas'],
			'deskripsi_label'=>$this->post['deskripsi_label'],
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
				'field'=>'lampiran_berkas', 
				'label'=>'Lampiran Berkas', 
				'rules'=>"required",
			),
			array(
				'field'=>'deskripsi_label', 
				'label'=>'Deskripsi Label', 
				'rules'=>"required",
			),
		);
	}

}