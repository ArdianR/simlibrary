<?php
class Subjek extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/subjeklist";
		$this->viewdetail = "panelbackend/subjekdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Subjek';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Subjek';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Subjek';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Subjek';
		}

		$this->model = new SubjekModel();
		$typesubjek = new TypeSubjekModel();

		$rstypesubjek = $typesubjek->GArray();

		$typesubjekarr = array(''=>'');
		foreach($rstypesubjek as $row){
			$typesubjekarr[$row['id_type_subjek']] = $row['nama'];
		}

		$this->data['typesubjekarr'] = $typesubjekarr;

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			''
		);
	}

	protected function Header(){
		return array(
			array(
				'name'=>'kode_klasifikasi', 
				'label'=>'Kode Klasifikasi', 
				'width'=>"auto",
				'type'=>"varchar",
			),
			array(
				'name'=>'id_type_subjek', 
				'label'=>' Type Subjek', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['typesubjekarr'],
			),
			array(
				'name'=>'daftar_terkendali', 
				'label'=>'Daftar Terkendali', 
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
			'kode_klasifikasi'=>$this->post['kode_klasifikasi'],
			'id_type_subjek'=>$this->post['id_type_subjek'],
			'daftar_terkendali'=>$this->post['daftar_terkendali'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'kode_klasifikasi', 
				'label'=>'Kode Klasifikasi', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_type_subjek', 
				'label'=>' Type Subjek', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_type_subjek', 
				'label'=>' Type Subjek', 
				'rules'=>"number",
			),
			array(
				'field'=>'daftar_terkendali', 
				'label'=>'Daftar Terkendali', 
				'rules'=>"required",
			),
		);
	}

}