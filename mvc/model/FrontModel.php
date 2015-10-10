<?php
class FrontModel extends Model{
	function __construct(){
		parent::__construct();
	}

	public function GetMenu($parent=false, $level=0, &$active=''){
		$level++;
		if(!$parent){
			$param = "where parent_halaman is null";
		}else{
			$param = "where parent_halaman = '$parent'";
		}
		$data = $this->GetArray("select * from contents_page_halaman $param order by urutan");

		if($data){
			$curr = trim($_SERVER['PATH_INFO'],'/');
			if($level==1){
				if(!$curr){
					$active = '--brand-color';
				}else{
					$active = '';
				}
				echo '<ul class="nav nav-tabs nav-stacked main-menu">';
				echo '<li class="header-logo-account__sundry-item"><a href="'.URL::Base().'" class="header-logo-account__sundry-main-link'.$active.' -rounded-corners">HOME</a></li>';
			}else{
				echo '<ul class="sub-menu">';
			}
			foreach ($data as $key => $value) {

				if($level==1){
					$value['nama'] = strtoupper($value['nama']);
				}
				$url = str_replace(' ', '-', $value['nama']).'.html';
				# code...
				$active ='';
				switch($value['jenis']){
					case 1:
						echo '<li class="'.$active.' header-logo-account__sundry-item"><a href="#" class="header-logo-account__sundry-main-link'.$active.' -rounded-corners">'.$value['nama'].'</a>';
					break;
					case 2:
						$url1 = "pagedetail/index/{$value['halaman']}/$url";
						if($curr==$url1){
							$active = '--brand-color';
						}
						$url1 = URL::Base($url1);
						echo "<li class=\"{$active} header-logo-account__sundry-item\"><a href=\"".$url1."\" class=\"header-logo-account__sundry-main-link".$active." -rounded-corners\">{$value['nama']}</a>";
					break;
					case 3:
						$url1 = "page/index/{$value['halaman']}";
						if($curr==$url1){
							$active = '--brand-color';
						}
						$url1 = URL::Base($url1);
						echo "<li class=\"{$active} header-logo-account__sundry-item\"><a href=\"".$url1."\" class=\"header-logo-account__sundry-main-link".$active." -rounded-corners\">{$value['nama']}</a>";
					break;
					case 4:
						$url1 = "$value[halaman]";
						if($curr==$url1){
							$active = '--brand-color';
						}
						$url1 = URL::Base($url1);
						echo '<li class="'.$active.' header-logo-account__sundry-item"><a href="'.$url1.'" class="header-logo-account__sundry-main-link'.$active.' -rounded-corners">'.$value['nama'].'</a>';
					break;
				}
				

				//$this->GetMenu($value['halaman'], $level, $active);
				echo '</li>';
			}
			echo "</ul>";
		}
	}

	public function GetMenuMobile($parent=false,$level=0){
		if(!$parent){
			$param = "where parent_halaman is null";
		}else{
			$param = "where parent_halaman = '$parent'";
		}
		$data = $this->GetArray("select * from contents_page_halaman $param order by urutan");

		$strip = '';
		for($i=0; $i<$level; $i++){
			$strip .= '-';
		}
		$level++;
		if($level==1){
			echo '<ul>';
			echo '<li><a class="off-canvas-category-link--empty" href="'.URL::Base().'">'."HOME</a></li>";
		}
		if($data){
			foreach ($data as $key => $value) {
				# code...

				if($level==1){
					$value['nama'] = strtoupper($value['nama']);
				}
				$url = str_replace(' ', '-', $value['nama']).'.html';
				echo '<li>';
				switch($value['jenis']){
					case 1:
						echo '<a class="off-canvas-category-link--empty" href value="#">'.$strip.' '.$value['nama']."</a>";
					break;
					case 2:
						echo "<a class=\"off-canvas-category-link--empty\" href=\"".URL::Base("pagedetail/index/{$value['halaman']}/$url")."\">{$strip}{$value['nama']}</a>";
					break;
					case 3:
						echo "<a class=\"off-canvas-category-link--empty\" href=\"".URL::Base("page/index/{$value['halaman']}")."\">{$strip}{$value['nama']}</a>";
					break;
					case 4:
						echo '<a class="off-canvas-category-link--empty" href="'.URL::Base("$value[halaman]").'">'.$strip.$value['nama']."</a>";
					break;
				}
				//$this->GetMenuMobile($value['halaman'],$level);
				echo '</li>';
			}
		}
		echo '</ul>';
	}

	public function GetSponsor(){
		$sql = "select * from contents_sponsor where is_aktif = 1";
		$data = $this->conn->GetArray($sql);
		return $data;
	}

	private function _getDetailInfoFooter($data){
		$i=0;
		$data3 = array();
		foreach ($data as $key => $value) {
			$sql = "select * from contents_page a where halaman='".$value['halaman']."' order by modified_date desc limit 5";
			$data2 = $this->conn->GetArray($sql);
			$data3[$i] = $value;
			$data3[$i]['list'] = $data2;
			$i++;
		}

		return $data3;
	}

	public function _updateStatistik(){
		$tanggal = date('Y-m-d');

		$cek = $this->conn->GetOne("
			select 1 
			from contents_statistik_pengunjung 
			where tanggal = '$tanggal'"
		);

		if($cek){
			return $this->conn->Execute("
				update 
				contents_statistik_pengunjung set jumlah = jumlah+1
				where tanggal = '$tanggal'"
			);
		}else{
			return $this->conn->Execute("
				insert 
				into contents_statistik_pengunjung (tanggal, jumlah)
				values ('$tanggal',1)"
			);
		}
	}

	function statistik(){
		$sql = "select sum(jumlah) from contents_statistik_pengunjung where tanggal = curdate()";
		$data['hari'] = $this->conn->GetOne($sql);
		$sql = "select sum(jumlah) from contents_statistik_pengunjung where tanggal = subdate(current_date, 1)";
		$data['kemarin'] = $this->conn->GetOne($sql);
		$sql = "select sum(jumlah) from (select * from contents_statistik_pengunjung where DATE_FORMAT(tanggal,'%m-%Y') = DATE_FORMAT(curdate(),'%m-%Y') order by tanggal desc limit 6) a";
		$data['minggu'] = $this->conn->GetOne($sql);
		$sql = "select sum(jumlah) from contents_statistik_pengunjung where DATE_FORMAT(tanggal,'%m-%Y') = DATE_FORMAT(curdate(),'%m-%Y')";
		$data['bulan'] = $this->conn->GetOne($sql);
		$sql = "select sum(jumlah) from contents_statistik_pengunjung where DATE_FORMAT(tanggal,'%Y') = DATE_FORMAT(curdate(),'%Y')";
		$data['tahun'] = $this->conn->GetOne($sql);
		$sql = "select sum(jumlah) from contents_statistik_pengunjung";
		$data['total'] = $this->conn->GetOne($sql);
		return $data;
	}
}