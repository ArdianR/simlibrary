<?php class BukuModel extends _baseModel{
	public $table = "library_buku";
	public $pk = 'id_buku';
	function __construct(){
		parent::__construct();
	}

	function GetKategori(){
		return array();
	}
}
