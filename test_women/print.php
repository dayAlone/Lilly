<?php

require_once('../classes/define.php');
require_once('../classes/db.php');

if(!session_id()){
	session_start();
}
if(!empty($_GET['token'])){
	$token = $_GET['token'];
} else {
	$token = session_id();
}

if(!empty($token)){
	$db = new DB();
	$sql = 'SELECT answers, balls, pow FROM test_woman WHERE session = "'.session_id().'"';
	$result = $db->get_row($sql);
	
	if($result){
		
		$template = file_get_contents('print.html');
		$answers = explode(',',$result['answers']);
		foreach($answers as $key => &$val){
			$val = htmlspecialchars($val);
			$k	 = 'active_'.($key+1).'_'.$val;
			$template = str_replace('{'.$k.'}', 'class="active"', $template);
		}
		
		foreach($result as $key=>$val){
			$val = htmlspecialchars($val);
			$template = str_replace('{'.$key.'}', $val, $template);
		}
		
		$template = preg_replace('/{[\w\/\?\:]+}/','', $template);
		file_put_contents('pdf/content_'.$token.'.html', $template);
		
		echo $template;
		die();
/*		$url = urlencode('http://apps.ochenprosto.ru/woman/pdf/content_'.$token.'.html');
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://html2pdf.ru/convert.php?url='.$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$page = curl_exec($ch);

		$pos 	= strpos($page,'href');
		$posEnd = strpos($page,'.pdf',($pos+6));
		$link 	= trim(substr($page, ($pos+6), $posEnd-$pos));
		
		curl_setopt($ch, CURLOPT_URL, 'http://html2pdf.ru'.$link);
		$pdf = curl_exec($ch);
		curl_close($ch);

	    header("Content-Type: application/pdf");
	    header("Cache-Control: no-cache");
	    header("Accept-Ranges: none");
	    header("Content-Disposition: attachment; filename=\"ochenprosto_ru.pdf\"");
		echo $pdf;
*/		
	} else {
		header('Location: index.html');
	}
} else {
	header('Location: index.html');
}