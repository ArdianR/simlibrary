<?php
class Kalaterbit extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/kalaterbitlist";
		$this->viewdetail = "panelbackend/kalaterbitdetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Kalaterbit';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Kalaterbit';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Kalaterbit';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Kalaterbit';
		}

		$this->model = new KalaterbitModel();
		$bahasa = new BahasaModel();

		$rsbahasa = $bahasa->GArray();

		$bahasaarr = array(''=>'');
		foreach($rsbahasa as $row){
			$bahasaarr[$row['id_bahasa']] = $row['bahasa'];
		}

		$this->data['bahasaarr'] = $bahasaarr;
		$satuan = new SatuanModel();

		$rssatuan = $satuan->GArray();

		$satuanarr = array(''=>'');
		foreach($rssatuan as $row){
			$satuanarr[$row['id_satuan']] = $row['nama'];
		}

		$this->data['satuanarr'] = $satuanarr;

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
				'name'=>'id_bahasa', 
				'label'=>' Bahasa', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['bahasaarr'],
			),
			array(
				'name'=>'selang_waktu', 
				'label'=>'Selang Waktu', 
				'width'=>"auto",
				'type'=>"time",
			),
			array(
				'name'=>'id_satuan', 
				'label'=>' Satuan', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['satuanarr'],
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
			'id_bahasa'=>$this->post['id_bahasa'],
			'selang_waktu'=>$this->post['selang_waktu'],
			'id_satuan'=>$this->post['id_satuan'],
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
				'field'=>'id_bahasa', 
				'label'=>' Bahasa', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_bahasa', 
				'label'=>' Bahasa', 
				'rules'=>"number",
			),
			array(
				'field'=>'selang_waktu', 
				'label'=>'Selang Waktu', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_satuan', 
				'label'=>' Satuan', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_satuan', 
				'label'=>' Satuan', 
				'rules'=>"number",
			),
		);
	}

}