<?php
class Pesan extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
		$this->viewlist = "panelbackend/pesanlist";
		$this->viewdetail = "panelbackend/pesandetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Pesan';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Pesan';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Pesan';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Pesan';
		}

		$elearningsiswa = new SiswaModel();

		$rselearningsiswa = $elearningsiswa->GArray();

		$elearningsiswaarr = array(''=>'');
		foreach($rselearningsiswa as $row){
			$elearningsiswaarr[$row['id_siswa']] = $row['nama'];
		}

		$this->data['elearningsiswaarr'] = $elearningsiswaarr;

		$this->model = new PesanModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
		$this->plugin_arr = array(
			'chosen'
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
				'name'=>'isi', 
				'label'=>'Isi', 
				'width'=>"auto",
				'type'=>"text",
			),
			array(
				'name'=>'jenis_pesan', 
				'label'=>'Jenis Pesan', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>array(''=>'','1'=>'Umum','0'=>'Pribadi'),
			),
		);
	}

	protected function Record(){
		return array(
			'jenis_pesan'=>(int)$this->post['jenis_pesan'],
			'isi'=>$this->post['isi'],
			'nama'=>$this->post['nama'],
		);
	}

	protected function Rules(){
		return array(
			array(
				'field'=>'isi', 
				'label'=>'Isi', 
				'rules'=>"required",
			),
			array(
				'field'=>'nama', 
				'label'=>'Nama', 
				'rules'=>"required",
			),
		);
	}
	protected function _getDetail($id){
		$this->data['row']['id_siswa'] = array();
		$guruarr = $this->conn->GetArray("select id_siswa from elearning_pesan_penerima where id_pesan = '$id'");
		foreach ($guruarr as $key => $value) {
			# code...
			$this->data['row']['id_siswa'][]=$value['id_siswa'];
		}
	}
	protected function _addInsert($id){
		if($this->post['id_siswa']){
			$return = $this->_delsertSiswa($id);
		}

		return $return;
	}

	function _delsertSiswa($id){
		$return = $this->model->Execute("delete from elearning_pesan_penerima where id_pesan = '$id'");
		if(is_array($this->post['id_siswa'])){
			foreach ($this->post['id_siswa'] as $key => $value) {
				if($return){
					if(!$value)
						continue;

					$record = array();
					$record['id_siswa'] = $value;
					$record['id_pesan'] = $id;
			        $col = $this->conn->SelectLimit("select * from elearning_pesan_penerima",1);
			        $sql = $this->conn->GetInsertSQL($col, $record);
			        
			        if($sql){
					    $return = $this->conn->Execute($sql);
					}
				}
			}
		}elseif($this->post['id_siswa']){
			if($return){
				$record = array();
				$record['id_siswa'] = $id;
				$record['id_pesan'] = $id;
		        $col = $this->conn->SelectLimit("select * from elearning_pesan_penerima",1);
		        $sql = $this->conn->GetInsertSQL($col, $record);
		        
		        if($sql){
				    $return = $this->conn->Execute($sql);
				}
			}
		}
		return $return;
	}

	protected function _addUpdate($id){
		if($this->post['id_siswa']){
			$return = $this->_delsertSiswa($id);
		}

		return $return;
	}

}