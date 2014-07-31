<?php
if(!session_id()){
	session_start();
}
if(!empty($_GET['token'])){
	$token = $_GET['token'];
} else {
	$token = session_id();
}
if(!empty($token)){
	if($_COOKIE['ansvers']){
		
		$template = file_get_contents('email.html');
		$answers = explode(',',$_COOKIE['ansvers']);
		foreach($answers as $key => &$val){
			$val = htmlspecialchars($val);
			$k	 = 'active_'.($key+1).'_'.$val;
			$template = str_replace('{'.$k.'}', 'color:black;position:relative;"><img src="http://ochenprosto.ru/test_man/img/print_ok.jpg" style="position:absolute;left: -30px;top:-8px;" alt="" width="20">', $template);
		}
		
		foreach(array("balls"=>$_COOKIE['balls'], "pow"=>$_COOKIE['pow']) as $key=>$val){
			$val = htmlspecialchars($val);
			$template = str_replace('{'.$key.'}', $val, $template);
		}
		
		$template = preg_replace('/{[\w\/\?\:]+}/','">', $template);
		//file_put_contents('pdf/content_'.$token.'.html', $template);
		
		//echo $template;
		
		$to = $_REQUEST['email'];

		// тема письма
		$subject = 'Результаты теста «Оценка эректильной функции*» на сайте ochenprosto.ru';


		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Дополнительные заголовки
		$headers .= 'From: Ochenprosto.ru <test@ochenprosto.ru>' . "\r\n";
		// Отправляем
		$x = mail($to, $subject, $template, $headers);
		if ($x)
			echo "success";
	}
}