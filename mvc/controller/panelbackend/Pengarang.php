<?php
class Pengarang extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/pengaranglist";
		$this->viewdetail = "panelbackend/pengarangdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Pengarang';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Pengarang';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Pengarang';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Pengarang';
		}

		$this->model = new PengarangModel();
		$kepengarangan = new KepengaranganModel();

		$rskepengarangan = $kepengarangan->GArray();

		$kepengaranganarr = array(''=>'');
		foreach($rskepengarangan as $row){
			$kepengaranganarr[$row['id_kepengarangan']] = $row['jenis'];
		}

		$this->data['kepengaranganarr'] = $kepengaranganarr;

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
				'name'=>'tahun_lahir', 
				'label'=>'Tahun Lahir', 
				'width'=>"auto",
				'type'=>"int",
			),
			array(
				'name'=>'id_kepengarangan', 
				'label'=>' Kepengarangan', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['kepengaranganarr'],
			),
			array(
				'name'=>'daftar_terkendali', 
				'label'=>'Daftar Terkendali', 
				'width'=>"auto",
				'type'=>"int",
			),
		);
	}

	protected function Record(){
		return array(
			'nama'=>$this->post['nama'],
			'tahun_lahir'=>$this->post['tahun_lahir'],
			'id_kepengarangan'=>$this->post['id_kepengarangan'],
			'daftar_terkendali'=>$this->post['daftar_terkendali'],
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
				'field'=>'tahun_lahir', 
				'label'=>'Tahun Lahir', 
				'rules'=>"required",
			),
			array(
				'field'=>'tahun_lahir', 
				'label'=>'Tahun Lahir', 
				'rules'=>"number",
			),
			array(
				'field'=>'id_kepengarangan', 
				'label'=>' Kepengarangan', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_kepengarangan', 
				'label'=>' Kepengarangan', 
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