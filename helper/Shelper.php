<?php

function mime($ext){
	$mimes = array(	'hqx'	=>	'application/mac-binhex40',
				'cpt'	=>	'application/mac-compactpro',
				'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
				'bin'	=>	'application/macbinary',
				'dms'	=>	'application/octet-stream',
				'lha'	=>	'application/octet-stream',
				'lzh'	=>	'application/octet-stream',
				'exe'	=>	array('application/octet-stream', 'application/x-msdownload'),
				'class'	=>	'application/octet-stream',
				'psd'	=>	'application/x-photoshop',
				'so'	=>	'application/octet-stream',
				'sea'	=>	'application/octet-stream',
				'dll'	=>	'application/octet-stream',
				'oda'	=>	'application/oda',
				'pdf'	=>	array('application/pdf', 'application/x-download'),
				'ai'	=>	'application/postscript',
				'eps'	=>	'application/postscript',
				'ps'	=>	'application/postscript',
				'smi'	=>	'application/smil',
				'smil'	=>	'application/smil',
				'mif'	=>	'application/vnd.mif',
				'xls'	=>	array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
				'ppt'	=>	array('application/powerpoint', 'application/vnd.ms-powerpoint'),
				'wbxml'	=>	'application/wbxml',
				'wmlc'	=>	'application/wmlc',
				'dcr'	=>	'application/x-director',
				'dir'	=>	'application/x-director',
				'dxr'	=>	'application/x-director',
				'dvi'	=>	'application/x-dvi',
				'gtar'	=>	'application/x-gtar',
				'gz'	=>	'application/x-gzip',
				'php'	=>	'application/x-httpd-php',
				'php4'	=>	'application/x-httpd-php',
				'php3'	=>	'application/x-httpd-php',
				'phtml'	=>	'application/x-httpd-php',
				'phps'	=>	'application/x-httpd-php-source',
				'js'	=>	'application/x-javascript',
				'swf'	=>	'application/x-shockwave-flash',
				'sit'	=>	'application/x-stuffit',
				'tar'	=>	'application/x-tar',
				'tgz'	=>	array('application/x-tar', 'application/x-gzip-compressed'),
				'xhtml'	=>	'application/xhtml+xml',
				'xht'	=>	'application/xhtml+xml',
				'zip'	=>  array('application/x-zip', 'application/zip', 'application/x-zip-compressed'),
				'mid'	=>	'audio/midi',
				'midi'	=>	'audio/midi',
				'mpga'	=>	'audio/mpeg',
				'mp2'	=>	'audio/mpeg',
				'mp3'	=>	array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
				'aif'	=>	'audio/x-aiff',
				'aiff'	=>	'audio/x-aiff',
				'aifc'	=>	'audio/x-aiff',
				'ram'	=>	'audio/x-pn-realaudio',
				'rm'	=>	'audio/x-pn-realaudio',
				'rpm'	=>	'audio/x-pn-realaudio-plugin',
				'ra'	=>	'audio/x-realaudio',
				'rv'	=>	'video/vnd.rn-realvideo',
				'wav'	=>	array('audio/x-wav', 'audio/wave', 'audio/wav'),
				'bmp'	=>	array('image/bmp', 'image/x-windows-bmp'),
				'gif'	=>	'image/gif',
				'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
				'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
				'jpe'	=>	array('image/jpeg', 'image/pjpeg'),
				'png'	=>	array('image/png',  'image/x-png'),
				'tiff'	=>	'image/tiff',
				'tif'	=>	'image/tiff',
				'css'	=>	'text/css',
				'html'	=>	'text/html',
				'htm'	=>	'text/html',
				'shtml'	=>	'text/html',
				'txt'	=>	'text/plain',
				'text'	=>	'text/plain',
				'log'	=>	array('text/plain', 'text/x-log'),
				'rtx'	=>	'text/richtext',
				'rtf'	=>	'text/rtf',
				'xml'	=>	'text/xml',
				'xsl'	=>	'text/xml',
				'mpeg'	=>	'video/mpeg',
				'mpg'	=>	'video/mpeg',
				'mpe'	=>	'video/mpeg',
				'qt'	=>	'video/quicktime',
				'mov'	=>	'video/quicktime',
				'avi'	=>	'video/x-msvideo',
				'movie'	=>	'video/x-sgi-movie',
				'doc'	=>	'application/msword',
				'docx'	=>	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'xlsx'	=>	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
				'word'	=>	array('application/msword', 'application/octet-stream'),
				'xl'	=>	'application/excel',
				'eml'	=>	'message/rfc822',
				'json' 	=> array('application/json', 'text/json'),
				'pptx'	=> 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
			);
	return $mimes[$ext];
}

function array_ramdom($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) { 
    $random[$key] = $list[$key]; 
  }
  return $random; 
} 

function replaceSingleQuote(&$val){
	if(is_array($val)){
		foreach($val as $k=>$v){
			$val[$k]=replaceSingleQuote($v);
		}
	}else{
		$val = str_replace("'", "''", $val);
	}
}

function ReadMore($text='',$urlreadmore='#',$readmore=true){
	$str='';
	$str.=strstr($text, '<br /><!-- pagebreak --><br />', true);
	if(!$str){
		$str.=strstr($text, '<!-- pagebreak -->', true);
	}
	if(!$str){
		$readmore = false;
		$str.= $text;
	}
	if($readmore){
		$str.='<a title="Read more" href="'.$urlreadmore.'" class="more">Read more →</a>';
	}
	$str.="<div style='clear:both'></div>";


	return $str;
}

function DifTime($time1, $time2){
	$time1 = strtotime($time1);
	$time2 = strtotime($time2);
	$time3 = $time1-$time2;
	$jam = floor($time3/3600);
	$time3 = $time3%3600;
	$menit = floor($time3/60);
	$time3 = $time3%60;
	$detik = $time3;
	return $jam.' jam, '. $menit.' menit, '. $detik.' detik';
}



function ReadMorePlain($text='',$count_word=10){
	$text = str_replace(array('<h2>','</h2>','<p>','</p>','<strong>','</strong>', '<ol>', '</ol>', '<li>', '</li>', '<!-- pagebreak -->'),'',$text);
	$text = str_replace(array('  ', '&nbsp;',"\r\t","\r\n"), ' ', $text);

	$text_arr = explode(' ', $text);

	$i=0;
	$str = '';
	foreach ($text_arr as $key => $value) {
		$i++;
		$str.=$value.' ';
		if($count_word==$i)
			break;
	}

	return $str;
}

#2012-01-01
function Eng2Ind($datetime,$is_time=true){
	$exp = explode(" ", $datetime);
	$date = $datetime;
	$time = '';
	if(count($exp)>1){
		$time = substr($exp[1], 0, 8);
		$date = $exp[0];
	}

	if(!$is_time)
		$time = '';
	
	$exp1 = explode("-", $date);
	$list_bulan = ListBulan();
	return $exp1[2].' '.$list_bulan[$exp1[1]].' '.$exp1[0].' '.$time;
}

function ListBulan(){
	return array(
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'Nopember',
			'12'=>'Desember',
		);
}