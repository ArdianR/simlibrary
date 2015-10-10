<?php class MemberModel extends _baseModel{
	public $table = "library_member";
	public $pk = 'id_member';
	
	function __construct(){
		parent::__construct();
	}
}
