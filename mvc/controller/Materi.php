<?php
class Materi extends _visitorController{

	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$this->viewlist = "materilist";
		$this->viewdetail = "materidetail";
		$this->template = "main";
		$this->layout = "layout1";

		$this->data['page_title']='Daftar Materi';
		$this->model = new MateriModel();

		$modelmatapelajaran = new MatapelajaranModel();

		$rsmatapelajaran = $modelmatapelajaran->GArray();
		foreach($rsmatapelajaran as $row){
			$listmatapelajaran[$row['id_matapelajaran']]=$row['nama'];
		}

		$this->data['listmatapelajaran'] = $listmatapelajaran;

		$this->pk = $this->model->pk;
		$this->data['pk'] = $this->pk;

		$this->_setFilter($filter);
	}

	function _actionIndex($page=1){
		$this->data['list']=$this->_getList($page);
		
		$this->data['page']=$page;
		$this->data['total_rows']=$this->data['list']['total'];

		$param_paging = array(
			'base_url'=>URL::Base("materi/index"),
			'cur_page'=>$page,
			'total_rows'=>$this->data['list']['total'],
			'per_page'=>$this->limit,
			'first_tag_open'=>'<li>',
			'first_tag_close'=>'</li>',
			'last_tag_open'=>'<li>',
			'last_tag_close'=>'</li>',
			'cur_tag_open'=>'<li><span class="pagination__page--current">',
			'cur_tag_close'=>'</span></li>',
			'next_tag_open'=>'<li>',
			'next_tag_close'=>'</li>',
			'prev_tag_open'=>'<li>',
			'prev_tag_close'=>'</li>',
			'num_tag_open'=>'<li>',
			'num_tag_close'=>'</li>',
			'anchor_class'=>'pagination__page',

			);
		$paging = new Pagination($param_paging);

		$this->data['paging']=$paging->create_links();

		$this->data['limit']=$this->limit;
		
		$this->data['limit_arr']=$this->limit_arr;

		$this->View($this->viewlist);
	}

	function _actionSetMatapelajaran($id_matapelajaran){

		$this->post['list_filter'] = array('id_matapelajaran'=>array($id_matapelajaran));
		if(!count($this->post['list_filter'])){
			$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = array();
		}elseif(!$_SESSION[SESSION_APP][$this->ctrl]['list_filter']){
			$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = $this->post['list_filter'];
		}else{
			$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = array_merge($_SESSION[SESSION_APP][$this->ctrl]['list_filter'],$this->post['list_filter']);
		}

		URL::Redirect('materi');
	}

	protected function _getList($page=1){
		$this->_resetList();
		
		$param=array(
			'page' => $page,
			'limit' => $this->_limit(),
			'order' => $this->_order(),
			'filter' => $this->_getFilter()
		);

		if($this->post['act']){
			URL::Redirect('materi');
		}

		$respon = $this->model->SelectGrid(
			$param
		);
		
		return $respon;
	}


	function _actionDetail($id=null, $title=''){		

		$this->data['row'] = $this->model->GetByPk($id);
		if (!$this->data['row'])
			$this->NoData();
		
		$this->View($this->viewdetail);		
	}


	function _actionPreviewFile($id_materi){
		$modelfile = new MateriFileModel();

		$row = $modelfile->GRow("*","where id_materi = $id_materi");
		if($row ){
			header("Content-Type: {$row['content_type']}");
			header("Content-Disposition: inline; filename='{$row['nama']}'");
			echo base64_decode($row['isi_file']);
		}else{
			$this->Error404();
		}	
	}

	protected function _getFilter(){
		$this->xss_clean = true;

		$this->FilterRequest();

		$filter_arr = array();
		if($this->post['act']=='list_filter'){
			if(!count($this->post['list_filter'])){
				$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = array();
			}elseif(!$_SESSION[SESSION_APP][$this->ctrl]['list_filter']){
				$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = $this->post['list_filter'];
			}else{
				$_SESSION[SESSION_APP][$this->ctrl]['list_filter'] = array_merge($_SESSION[SESSION_APP][$this->ctrl]['list_filter'],$this->post['list_filter']);
			}
		}
		#format lama data = array(array('key'=>'id_matapelajaran','value'=>array('1','2','3')))
		#format baru data = array('id_matapelajaran'=>array(1,2,3,4,5))
		if($_SESSION[SESSION_APP][$this->ctrl]['list_filter']){
			$this->data['list_filter'] = $_SESSION[SESSION_APP][$this->ctrl]['list_filter'];
			foreach ($_SESSION[SESSION_APP][$this->ctrl]['list_filter'] as $key=>$values){
				$filter_arr1 = array();
				foreach($values as $k=>$v){
					replaceSingleQuote($v);
					if(!empty($v))
						$filter_arr1[] = $key ." = '$v'";
				}

				$filter_str = implode(' or ',$filter_arr1);

				if($filter_str){
					$filter_arr[]="($filter_str)";
				}
			}
		}	


		if($this->post['act']=='search'){
			$_SESSION[SESSION_APP][$this->ctrl]['keyword'] = $this->post['keyword'];
		}

		if($_SESSION[SESSION_APP][$this->ctrl]['keyword']){
			$this->data['keyword'] = $keyword = strtolower($_SESSION[SESSION_APP][$this->ctrl]['keyword']);
			replaceSingleQuote($keyword);
			$filter_arr[]=" (lower(nama) like '%{$keyword}%' or lower(isi) like '%{$keyword}%')";
		}


		if($this->post['act']=='list_search' && $this->post['list_search']){
			if(!$_SESSION[SESSION_APP][$this->ctrl]['list_search']){
				$_SESSION[SESSION_APP][$this->ctrl]['list_search'] = $this->post['list_search'];
			}else{
				$_SESSION[SESSION_APP][$this->ctrl]['list_search'] = array_merge($_SESSION[SESSION_APP][$this->ctrl]['list_search'],$this->post['list_search']);

			}
		}

		if($_SESSION[SESSION_APP][$this->ctrl]['list_search']){
			foreach ($_SESSION[SESSION_APP][$this->ctrl]['list_search'] as $k=>$v){
				replaceSingleQuote($v);
				if(!empty($v))
					$filter_arr[]="lower($k) like '%$v%'";
			}
		}	

		$this->data['filter_arr'] = $_SESSION[SESSION_APP][$this->ctrl]['list_search'];

		if(count($filter_arr)){
			$this->filter .= ' and '.implode(' and ', $filter_arr);
		}


		return $this->filter;
	}
}
