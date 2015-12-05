<?php
class Home extends _visitorController{

	public $limit = 2;
	public function __construct(){
		parent::__construct();
		$this->template = "main";
		$this->layout = "layout1";

		$this->model = new PageModel();

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
	}
	function _actionIndex(){

		$this->data['artikel_new'] = $this->conn->GetArray("select * from contents_page where halaman = 'artikel' order by created_date limit 6");
		$this->data['materi_new'] = $this->conn->GetArray("select * from elearning_materi order by created_date limit 10");
		$this->data['ujian_live'] = $this->conn->GetArray("select a.*, b.nama as matapelajaran from elearning_ujian a
			left join elearning_matapelajaran b on a.id_matapelajaran = b.id_matapelajaran
			where now() between waktu_mulai and waktu_selesai or waktu_mulai > now() order by waktu_mulai asc");
		$this->view("home");
	}

}
