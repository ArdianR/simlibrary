<?php
class Bahasa extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/bahasalist";
		$this->viewdetail = "panelbackend/bahasadetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Bahasa';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Bahasa';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Bahasa';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Bahasa';
		}

		$this->model = new BahasaModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			''
		);
	}

	protected function Header(){
		return array(
			array(
				'name'=>'kode_bahasa', 
				'label'=>'Kode Bahasa', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'bahasa', 
				'label'=>'Bahasa', 
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
			'kode_bahasa'=>$this->post['kode_bahasa'],
			'bahasa'=>$this->post['bahasa'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'kode_bahasa', 
				'label'=>'Kode Bahasa', 
				'rules'=>"required",
			),
			array(
				'field'=>'bahasa', 
				'label'=>'Bahasa', 
				'rules'=>"required",
			),
		);
	}

}