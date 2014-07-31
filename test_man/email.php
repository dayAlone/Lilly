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
		$vars['balls'] = $_COOKIE['balls'];
		if($vars['balls'] >= 1 && $vars['balls'] <= 7){
			$vars['pow'] = 'тяжелая';
		} else if($vars['balls'] >= 8 && $vars['balls'] <= 11){
			$vars['pow'] = 'умеренная';
		} else if($vars['balls'] >= 12 && $vars['balls'] <= 16){
			$vars['pow'] = 'умеренно-легкая';
		} else if($vars['balls'] >= 17 && $vars['balls'] <= 21){
			$vars['pow'] = 'легкая';
		} else if($vars['balls'] >= 22 && $vars['balls'] <= 25){
			$vars['pow'] = 'норма';
		} else {
			$vars['pow'] = 'норма';
		}
		if($vars['balls'] >= 1 && $vars['balls'] <= 21){
			$vars['pow'] = 'Проконсультируйтесь с врачом о состоянии Вашего сексуального здоровья';
		} else {
			$vars['pow'] = 'Cкорее всего, все в норме';
		}
		for($i=0; $i < $_COOKIE['ansvers']+1; $i++){
			$val = htmlspecialchars($_COOKIE['ansver'.$i]);
			$k	 = 'active_'.($i+1).'_'.($val);
			$template = str_replace('{'.$k.'}', 'color:black;position:relative;"><img src="http://ochenprosto.ru/test_man/img/print_ok.jpg" style="position:absolute;left: -30px;top:-8px;" alt="" width="20">', $template);
		}

		$template = str_replace('{balls}', $_COOKIE['balls'], $template);
		$template = str_replace('{pow}', $vars['pow'], $template);
		
		$template = preg_replace('/{[\w\/\?\:]+}/','">', $template);

		
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