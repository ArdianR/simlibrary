<?php
class Ajax extends Controller{

	public function __construct(){
		parent::__construct();
	}

	function _actionMember($keyword=''){
		
		$data = $this->conn->GetArray("select id_member as id, nama as label from library_member where nama like '%$keyword%'");
		if(!$data) $data = array();
		echo json_encode($data,true);
	}
}