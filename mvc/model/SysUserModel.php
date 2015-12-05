<?php class SysUserModel extends Model{
	public $table = "public_sys_user";
	public $pk = 'user_id';
	public $arrNoquote=array();
	function __construct(){
		parent::__construct();
	}
}
