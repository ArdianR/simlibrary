<?php
class Buku extends _adminController{

	public $modelfile;

	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$this->viewlist = "panelbackend/bukulist";
		$this->viewdetail = "panelbackend/bukudetail";
		$this->template = "panelbackend/main";
		$this->layout = "panelbackend/layout1";

		if ($this->mode == 'add') {
			$this->data['page_title'] = 'Tambah Buku';
			$this->data['edited'] = true;
		}
		elseif ($this->mode == 'edit') {
			$this->data['page_title'] = 'Edit Buku';
			$this->data['edited'] = true;	
		}
		elseif ($this->mode == 'detail'){
			$this->data['page_title'] = 'Detail Buku';
			$this->data['edited'] = false;	
		}else{
			$this->data['page_title'] = 'Daftar Buku';
		}

		$this->model = new BukuModel();

		$this->modelfile = new BukuFileModel();

		#mengambil data lokasi
		$modellokasi = new LokasiModel();

		$rslokasi = $modellokasi->GArray();

		#membuat array lokasi
		$lokasiarr = array(''=>'-pilih-');
		foreach($rslokasi as $row){
			$lokasiarr[$row['id_lokasi']] = $row['nama'];
		}

		$this->data['lokasiarr'] = $lokasiarr;

		#mengambil data kategori
		$modelkategori = new KategoriModel();

		$rskategori = $modelkategori->GArray();

		#membuat array lokasi
		$kategoriarr = array(''=>'-pilih-');
		foreach($rskategori as $row){
			$kategoriarr[$row['id_kategori']] = $row['nama'];
		}

		$this->data['kategoriarr'] = $kategoriarr;


		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;
	}

	function _actionIndex( $page=1){
		$this->data['header']=array(
			array('name'=>'nama', 'label'=>'Nama', 'width'=>"auto"),
			array('name'=>'id_kategori', 'label'=>'Kategori', 'width'=>"auto", 'type'=>'list', 'value'=>$this->data['kategoriarr']),
			array('name'=>'id_lokasi', 'label'=>'Lokasi', 'width'=>"auto", 'type'=>'list', 'value'=>$this->data['lokasiarr']),
			array('name'=>'jumlah', 'label'=>'Jumlah', 'width'=>"auto"),
			
		);

		$this->data['list']=$this->_getList($page);

		$this->data['page']=$page;

		$param_paging = array(
			'base_url'=>URL::Base("panelbackend/buku/index"),
			'cur_page'=>$page,
			'total_rows'=>$this->data['list']['total'],
			'per_page'=>$this->limit
		);
		$paging = new Pagination($param_paging);

		$this->data['paging']=$paging->create_links();

		$this->data['limit']=$this->limit;
		
		$this->data['limit_arr']=$this->limit_arr;

		$this->View($this->viewlist);
	}


	function _actionAdd(){
		$this->_actionEdit();
	}
	function IsValid($record){
		$rules = array(
		   array(
				 'field'   => 'nama',
				 'label'   => 'Judul',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'penulis',
				 'label'   => 'Penulis',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'penerbit',
				 'label'   => 'Penerbit',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'isbn',
				 'label'   => 'ISBN',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'deskripsi',
				 'label'   => 'Deskripsi',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'id_lokasi',
				 'label'   => 'Lokasi',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'jumlah',
				 'label'   => 'Jumlah',
				 'rules'   => 'required'
			  ),
		   array(
				 'field'   => 'jumlah',
				 'label'   => 'Jumlah',
				 'rules'   => 'number'
			  )
		);

		$validation = new FormValidation($rules);

		if ($validation->run() == FALSE)
		{
			$this->data['err_msg'] = $validation->GetError();
		}    

		if($this->data['err_msg']){
			$this->data['row'] = $record;
			$this->View($this->viewdetail);
			exit();
		}
	}

	function _actionEdit($id=null){
		if($this->post['act']=='reset'){
			URL::Redirect();
		}

		$this->data['row'] = $this->model->GetByPk($id);
		if (!$this->data['row'] && $id)
			$this->NoData();
		
		## EDIT HERE ##
		if ($this->post['act'] === 'save') {
			$record = array();
			$record['nama'] = $this->post['nama'];
			$record['penulis'] = $this->post['penulis'];
			$record['penerbit'] = $this->post['penerbit'];
			$record['id_lokasi'] = $this->post['id_lokasi'];
			$record['id_kategori'] = $this->post['id_kategori'];
			$record['isbn'] = $this->post['isbn'];
			$record['deskripsi'] = $this->post['deskripsi'];
			$record['jumlah'] = $this->post['jumlah'];

			$this->IsValid($record);

			if($_FILES['file']['name']){
				$record['nama_file'] = $_FILES['file']['name'];
			}

            $this->setLogRecord($record,$id);

			if ($id) {
				$return = $this->model->Update($record, "$this->pk = $id");
				if ($return) {
					$this->_uploadFile($id);

					$this->SetFlash('suc_msg', $return['success']);
					URL::Redirect("$this->page_ctrl/edit/$id");					
				}
				else {
					$this->data['row'] = $record;
					$this->data['err_msg'] = "Data gagal diubah";
				}
			}
			else {
				$return = $this->model->Insert($record);
				if ($return) {
					$this->_uploadFile($return['data'][$this->pk]);

					$this->SetFlash('suc_msg', $return['success']);
					URL::Redirect("$this->page_ctrl/edit/".$return['data'][$this->pk]);					
				}
				else {
					$this->data['row'] = $record;
					$this->data['err_msg'] = "Data gagal disimpan";
				}
			}
		}
				
		$this->View($this->viewdetail);
	}

	function _actionDetail( $id=null){		
		$this->data['row'] = $this->model->GetByPk($id);
		if (!$this->data['row'])
			$this->NoData();
        
		$this->View($this->viewdetail);		
	}

	function _actionDelete( $id=null){
		$return = $this->model->delete("$this->pk = $id");
		if ($return) {
			$this->SetFlash('suc_msg', $return['success']);
			URL::Redirect("$this->page_ctrl");
		}
		else {
			$this->SetFlash('err_msg',"Data gagal didelete");
			URL::Redirect("$this->page_ctrl/detail/$id");		
		}

	}

	function _uploadFile($id_buku){
		$return = true;
		if($_FILES['file']['name']){
			$record = array();
			$record['nama'] = $_FILES['file']['name'];
			$record['id_buku'] = $id_buku;
			$record['content_type'] = $_FILES['file']['type'];
			$record['isi_file'] = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
			$cek = $this->modelfile->GOne("1","where id_buku = '$id_buku'");
			if($cek){
				$return = $this->modelfile->Update($record, "id_buku = '$id_buku'");
			}else{
				$return = $this->modelfile->Insert($record);
			}
		}
		return $return;
	}

	function _actionDeleteFile($id_buku){
		$return = $this->modelfile->delete("id_buku = $id_buku");
		if ($return) {
			$this->model->update(array('nama_file'=>''),"id_buku = $id_buku");
			$this->SetFlash('suc_msg', $return['success']);
		}
		else {
			$this->SetFlash('err_msg',"Data gagal didelete");	
		}
		URL::Redirect("$this->page_ctrl/edit/$id_buku");
	}

	function _actionPreviewFile($id_buku){
		$row = $this->modelfile->GRow("*","where id_buku = $id_buku");
		if($row ){
			header("Content-Type: {$row['content_type']}");
			header("Content-Disposition: inline; filename='{$row['nama']}'");
			echo base64_decode($row['isi_file']);
		}else{
			$this->Error404();
		}	
	}
}
