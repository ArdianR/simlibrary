<?php
class Buku extends _adminController{

	public function __construct(){
		parent::__construct();
	}
	
	protected function init(){
		parent::init();
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
		$kategori = new KategoriModel();

		$rskategori = $kategori->GArray();

		$kategoriarr = array(''=>'');
		foreach($rskategori as $row){
			$kategoriarr[$row['id_kategori']] = $row['nama'];
		}

		$this->data['kategoriarr'] = $kategoriarr;
		$pengarang = new PengarangModel();

		$rspengarang = $pengarang->GArray();

		$pengarangarr = array(''=>'');
		foreach($rspengarang as $row){
			$pengarangarr[$row['id_pengarang']] = $row['nama'];
		}

		$this->data['pengarangarr'] = $pengarangarr;
		$statuseksemplar = new StatusEksemplarModel();

		$rsstatuseksemplar = $statuseksemplar->GArray();

		$statuseksemplararr = array(''=>'');
		foreach($rsstatuseksemplar as $row){
			$statuseksemplararr[$row['id_status_eksemplar']] = $row['nama'];
		}

		$this->data['statuseksemplararr'] = $statuseksemplararr;
		$tipekoleksi = new TipekoleksiModel();

		$rstipekoleksi = $tipekoleksi->GArray();

		$tipekoleksiarr = array(''=>'');
		foreach($rstipekoleksi as $row){
			$tipekoleksiarr[$row['id_tipekoleksi']] = $row['nama'];
		}

		$this->data['tipekoleksiarr'] = $tipekoleksiarr;
		$penerbit = new PenerbitModel();

		$rspenerbit = $penerbit->GArray();

		$penerbitarr = array(''=>'');
		foreach($rspenerbit as $row){
			$penerbitarr[$row['id_penerbit']] = $row['nama'];
		}

		$this->data['penerbitarr'] = $penerbitarr;
		$lokasibuku = new LokasibukuModel();

		$rslokasibuku = $lokasibuku->GArray();

		$lokasibukuarr = array(''=>'');
		foreach($rslokasibuku as $row){
			$lokasibukuarr[$row['id_lokasibuku']] = $row['nama'];
		}

		$this->data['lokasibukuarr'] = $lokasibukuarr;
		$subjek = new SubjekModel();

		$rssubjek = $subjek->GArray();

		$subjekarr = array(''=>'');
		foreach($rssubjek as $row){
			$subjekarr[$row['id_subjek']] = $row['nama'];
		}

		$this->data['subjekarr'] = $subjekarr;
		$bahasa = new BahasaModel();

		$rsbahasa = $bahasa->GArray();

		$bahasaarr = array(''=>'');
		foreach($rsbahasa as $row){
			$bahasaarr[$row['id_bahasa']] = $row['nama'];
		}

		$this->data['bahasaarr'] = $bahasaarr;

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
				'name'=>'id_pengarang', 
				'label'=>' Pengarang', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['pengarangarr'],
			),
			array(
				'name'=>'id_lokasibuku', 
				'label'=>' Lokasibuku', 
				'width'=>"auto",
				'type'=>"list",
				'value'=>$this->data['lokasibukuarr'],
			),
			array(
				'name'=>'deskripsi', 
				'label'=>'Deskripsi', 
				'width'=>"auto",
				'type'=>"text",
			),
		);
	}

	protected function Record(){
		return array(
			'nama'=>$this->post['nama'],
			'id_pengarang'=>$this->post['id_pengarang'],
			'pernyataan'=>$this->post['pernyataan'],
			'edisi'=>$this->post['edisi'],
			'info_detail'=>$this->post['info_detail'],
			'id_eksemplar'=>$this->post['id_eksemplar'],
			'id_tipekoleksi'=>$this->post['id_tipekoleksi'],
			'isbn_issn'=>$this->post['isbn_issn'],
			'id_penerbit'=>$this->post['id_penerbit'],
			'id_lokasibuku'=>$this->post['id_lokasibuku'],
			'deskripsi'=>$this->post['deskripsi'],
			'judul_seri'=>$this->post['judul_seri'],
			'no_panggil'=>$this->post['no_panggil'],
			'id_subjek'=>$this->post['id_subjek'],
			'id_bahasa'=>$this->post['id_bahasa'],
			'abstrak'=>$this->post['abstrak'],
			'id_kategori'=>$this->post['id_kategori'],
			'nama_file'=>$this->post['nama_file'],
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
				'field'=>'id_pengarang', 
				'label'=>' Pengarang', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_pengarang', 
				'label'=>' Pengarang', 
				'rules'=>"number",
			),
			array(
				'field'=>'pernyataan', 
				'label'=>'Pernyataan', 
				'rules'=>"required",
			),
			array(
				'field'=>'edisi', 
				'label'=>'Edisi', 
				'rules'=>"required",
			),
			array(
				'field'=>'edisi', 
				'label'=>'Edisi', 
				'rules'=>"number",
			),
			array(
				'field'=>'info_detail', 
				'label'=>'Info Detail', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_eksemplar', 
				'label'=>' Eksemplar', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_eksemplar', 
				'label'=>' Eksemplar', 
				'rules'=>"number",
			),
			array(
				'field'=>'id_tipekoleksi', 
				'label'=>' Tipekoleksi', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_tipekoleksi', 
				'label'=>' Tipekoleksi', 
				'rules'=>"number",
			),
			array(
				'field'=>'isbn_issn', 
				'label'=>'Isbn Issn', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_penerbit', 
				'label'=>' Penerbit', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_penerbit', 
				'label'=>' Penerbit', 
				'rules'=>"number",
			),
			array(
				'field'=>'id_lokasibuku', 
				'label'=>' Lokasibuku', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_lokasibuku', 
				'label'=>' Lokasibuku', 
				'rules'=>"number",
			),
			array(
				'field'=>'deskripsi', 
				'label'=>'Deskripsi', 
				'rules'=>"required",
			),
			array(
				'field'=>'judul_seri', 
				'label'=>'Judul Seri', 
				'rules'=>"required",
			),
			array(
				'field'=>'no_panggil', 
				'label'=>'No Panggil', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_subjek', 
				'label'=>' Subjek', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_subjek', 
				'label'=>' Subjek', 
				'rules'=>"number",
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
				'field'=>'abstrak', 
				'label'=>'Abstrak', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_kategori', 
				'label'=>' Kategori', 
				'rules'=>"required",
			),
			array(
				'field'=>'id_kategori', 
				'label'=>' Kategori', 
				'rules'=>"number",
			),
		);
	}

}