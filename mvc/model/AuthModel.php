<?php class AuthModel extends Model{
	function __construct(){
		parent::__construct();
	}
	public function Login($username="", $password="")
	{
		$username = $this->conn->qstr($username);
		$password = $this->conn->qstr(sha1(md5($password)));
		$data = $this->GetRow("
		select * from public_sys_user
		where username=$username and password=$password
		and is_active = '1'
		");
		if($data)
		{
			$data['login']=true;
			unset($data['password']);

			$data1 = array();
			if($data['group_id']=='3'){
				$data1 = $this->GetRow("
				select id_guru, nip, nama, email from elearning_guru
				where email = '$data[username]'
				");
			}
			if($data['group_id']=='4'){
				$data1 = $this->GetRow("
				select id_siswa, nis, nisn, nama, email, id_kelas from elearning_siswa
				where email = '$data[username]'
				");
			}

			if(is_array($data1)){
				$data = array_merge($data, $data1);
			}

			foreach($data as $k=>$v){
				$_SESSION[SESSION_APP][$k]=$v;
			}
			$datenow = $this->conn->sysTimeStamp;
			$this->conn->Execute("
			update public_sys_user
			set last_ip = '{$_SERVER['REMOTE_ADDR']}', last_login = $datenow
			where username = '{$data['username']}'");
			return array('success'=>'login success');
		}
		return array('error'=>'login filed');
	}
	public function LoginAs($username="")
	{
		$username = $this->conn->qstr($username);
		$data = $this->GetRow("
		select * from public_sys_user
		where username=$username
		and is_active = '1'
		");
		if($data)
		{

			$loginas = $_SESSION[SESSION_APP];
			unset($_SESSION[SESSION_APP]);

			$data['login']=true;
			unset($data['password']);

			$data1 = array();
			if($data['group_id']=='3'){
				$data1 = $this->GetRow("
				select id_guru, nip, nama, email from elearning_guru
				where email = '$data[username]'
				");
			}
			if($data['group_id']=='4'){
				$data1 = $this->GetRow("
				select id_siswa, nis, nisn, nama, email, id_kelas from elearning_siswa
				where email = '$data[username]'
				");
			}

			if(is_array($data1)){
				$data = array_merge($data, $data1);
			}

			foreach($data as $k=>$v){
				$_SESSION[SESSION_APP][$k]=$v;
			}

			$_SESSION[SESSION_APP]['loginas'] = $loginas;

			$datenow = $this->conn->sysTimeStamp;
			$this->conn->Execute("
			update public_sys_user
			set last_ip = '{$_SERVER['REMOTE_ADDR']}', last_login = $datenow
			where username = '{$data['username']}'");
			return array('success'=>'login success');
		}
		return array('error'=>'login filed');
	}

	public function GetMenu($parent_id=null,$ul="<ul class=\"nav\" id=\"side-menu\">"){
		$ret = '';
		$group_id = $_SESSION[SESSION_APP]['group_id'];
		$user_id = $_SESSION[SESSION_APP]['user_id'];
		$filter = ($parent_id==null)?'b.parent_id is null':'b.parent_id = '.$parent_id;
		if($user_id == 1)
		{
			$strSQL = " SELECT b.*
						FROM public_sys_menu b
						WHERE visible = '1' and $filter
						ORDER BY b.sort";
		}else{
			$filter .= " and a.group_id =".$group_id;
			$strSQL = "	SELECT b.*
						FROM public_sys_group_menu a
						LEFT JOIN public_sys_menu b ON a.menu_id = b.menu_id
						WHERE b.visible = '1' and $filter
						ORDER BY b.sort";
		}
		$data = $this->GetArray($strSQL);
		if($data)
		{
			$ret.="$ul";
			foreach($data as $row){
				$ret.= "<li>";
					$url = '#';
					if($row['url']!=''){
						$url = URL::Base($row['url']);
					}
					$icon = '';
					if($row['iconcls']){
						
						$icon = "fa-{$row['iconcls']}";
					}
					$sub = $this->GetMenu($row['menu_id'],"<ul class=\"nav nav-second-level\">");
					if($sub){
						$ret.="<a href='".$url."'><i class='fa {$icon} fa-fw'></i> ".$row['label']." <span class=\"fa arrow\"></span></a>";
						$ret.=$sub;
					}elseif($row['url']!='panelbackend/page'){
						$ret.="<a href='".$url."'><i class='fa {$icon} fa-fw'></i> ".$row['label']."</a>";
					}elseif($row['url']=='panelbackend/page'){
						$ret .="<a href=\"#\"><i class=\"fa fa-sitemap fa-fw\"></i> Halaman-halaman<span class=\"fa arrow\"></span></a>";
						$page = $this->GetMenuCms();
						if($page){
				            $ret .="<ul class=\"nav nav-second-level\"> $page </ul>";
						}
					}
				$ret.="</li>";
			}
			$ret.="</ul>";
		}
		return $ret;
	}

	public function GetMenuCms($parent=false){
		if(!$parent){
			$param = "where parent_halaman is null";
		}else{
			$param = "where parent_halaman = '$parent'";
		}
		$data = $this->GetArray("select * from contents_page_halaman $param order by urutan");
		$ret = '';
		if($data){
			foreach ($data as $key => $value) {
				if($value['jenis']==4)
					continue;
				# code...
				$page = $this->GetMenuCms($value['halaman']);
				$ret .= "<li>";
				switch($value['jenis']){
					case 1:
						$ret .= "<a href=\"#\">";
					break;
					case 2:
						$ret .= "<a href=\"".URL::Base("panelbackend/pageone/index/{$value['halaman']}")."\">";
					break;
					case 3:
						$ret .= "<a href=\"".URL::Base("panelbackend/page/index/{$value['halaman']}")."\">";
					break;
					default:
						$ret .= "<a href=\"".URL::Base("panelbackend/{$value['halaman']}")."\">";
					break;
				}

				if($page){
		            $ret .="<i class=\"fa fa-folder fa-fw\"></i>{$value['nama']}<span class=\"fa arrow\"></span></a><ul class=\"nav nav-third-level\">
		                        	$page
		                        </ul>";
				}else{
					$ret .="<i class=\"fa fa-angle-right fa-fw\"></i>{$value['nama']}</a>";
				}

				$ret .="</li>";

			}
		}
		return $ret;
	}

	public function GetAction($url, $type){
		$group_id = $_SESSION[SESSION_APP]['group_id'];
		$user_id = $_SESSION[SESSION_APP]['user_id'];
		if($user_id == 1){
			$strSQL = "
				SELECT b.name
				from public_sys_action b
				LEFT JOIN public_sys_menu d ON b.menu_id=d.menu_id
				WHERE type = '$type' and b.visible = '1' AND d.url='$url'";
		}else{
			$strSQL = "
				SELECT b.name
				FROM public_sys_group_action a
				LEFT JOIN public_sys_action b ON a.action_id=b.action_id
				LEFT JOIN public_sys_group_menu c ON a.group_menu_id=c.group_menu_id
				LEFT JOIN public_sys_menu d ON c.menu_id=d.menu_id
				WHERE type = '$type'  and b.visible = '1' AND c.group_id = $group_id AND d.url='$url'";
		}
		
		$respons = $this->GetArray($strSQL);
		$respon = array();
		foreach($respons as $row)
		{
			$respon[]=$row['name'];
		}
		return $respon;
	}

	public function GetAccessRole($url=""){
		$group_id = $_SESSION[SESSION_APP]['group_id'];

		$sql = "
			SELECT 
			    ifnull(b.name,'index') as name
			FROM
			    public_sys_menu d
			        LEFT JOIN
			    public_sys_group_menu c ON c.menu_id = d.menu_id
			        left join
			    public_sys_group_action a ON a.group_menu_id = c.group_menu_id
			        LEFT JOIN
			    public_sys_action b ON a.action_id = b.action_id
			WHERE c.group_id = '$group_id' AND d.url='$url'";
		$data = $this->GetArray($sql);
		$return = array();
		foreach ($data as $key => $value) {
			# code...
			$return[]=$value['name'];
		}
		
		return $return;
	}

	public function GetAccessRole1($url="",$action=""){
		$group_id = $_SESSION[SESSION_APP]['group_id'];
		$user_id = $_SESSION[SESSION_APP]['user_id'];
		if($user_id == 1){
			return true;
		}
		$return = false;
		$action = strtolower(str_replace("_action","",$action));
		if($action == 'index'){
			$filter_action = '';
		}else{
			$filter_action = " AND b.name='$action'";
		}
		if(preg_match("/index/",$action)) $filter_action = "";
		$sql = "
			SELECT 1
			FROM public_sys_group_action a
			LEFT JOIN public_sys_action b ON a.action_id=b.action_id
			LEFT JOIN public_sys_group_menu c ON a.group_menu_id=c.group_menu_id
			LEFT JOIN public_sys_menu d ON c.menu_id=d.menu_id
			WHERE c.group_id = '$group_id' AND d.url='$url' $filter_action limit 1";
		$return = $this->GetOne($sql);
		return (bool)$return;
	}

	public function statistikVisitor($limit=6){
		$sql = "select * from (select * 
		from contents_statistik_pengunjung 
		order by tanggal desc limit $limit) a order by tanggal asc";
		$rows = $this->conn->GetArray($sql);

		$data = array();
		$ticks = array();
		foreach ($rows as $key => $value) {
			# code...
			$data[]=array($key, $value['jumlah']);
			$ticks[]=array($key, Eng2Ind($value['tanggal']));
		}

		$ret['data'] = json_encode($data);
		$ret['ticks'] = json_encode($ticks);
		return $ret;
	}

}
