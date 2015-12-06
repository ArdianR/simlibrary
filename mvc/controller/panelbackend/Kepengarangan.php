<?php
class Kepengarangan extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/kepengaranganlist";
		$this->viewdetail = "panelbackend/kepengarangandetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Kepengarangan';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Kepengarangan';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Kepengarangan';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Kepengarangan';
		}

		$this->model = new KepengaranganModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			''
		);
	}

	protected function Header(){
		return array(
			array(
				'name'=>'jenis', 
				'label'=>'Jenis', 
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
			'jenis'=>$this->post['jenis'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'jenis', 
				'label'=>'Jenis', 
				'rules'=>"required",
			),
		);
	}

}