<?php class BukuModel extends _baseModel{
	public $table = "library_buku";
	public $pk = 'id_buku';
	function __construct(){
		parent::__construct();
	}

	function GetKategori(){
		return array();
	}

	public function SelectGrid1($arr_param=array(), $str_field="*")
	{
		$arr_return = array();
		$arr_params = array(
			'page' => 1,
			'limit' => 50,
			'order' => '',
			'filter' => ''
		);
		foreach($arr_param as $key=>$val){
			$arr_params[$key]=$val;
		}

		$str_condition = "";
		$str_order = "";
		if(!empty($arr_params['filter']))
		{
			$str_condition = "where ".$arr_params['filter'];
		}
		if(!empty($arr_params['order']))
		{
			$str_order = "order by ".$arr_params['order'];
		}

		$arr_return['rows'] = $this->conn->PageExecute("
			select 
			a.*, b.nama as lokasi
			from 
			".$this->table." a left join library_lokasi b on a.id_lokasi = b.id_lokasi
			{$str_condition} 
			{$str_order} ",$arr_params['limit'],$arr_params['page']
		)->GetArray();
		
		$arr_return['total'] = static::GetOne("
			select 
			count(*) as total 
			from 
			".$this->table." a
			{$str_condition}
		");
		
		return $arr_return;
	}

	function GetByPk($id){
		if(!$id){
			return array();
		}
		$sql = "select a.*, b.nama as lokasi from ".$this->table." a left join library_lokasi b on a.id_lokasi = b.id_lokasi where {$this->pk} = '$id'";
		return $this->conn->GetRow($sql);
	}
}
