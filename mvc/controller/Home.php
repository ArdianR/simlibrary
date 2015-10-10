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

		$this->data['book_new'] = $this->conn->GetArray("select * from library_buku order by created_date limit 6");
		$this->data['best_book'] = $this->conn->GetArray("select * from library_buku order by created_date limit 6");
		$this->view("home");
	}

}
