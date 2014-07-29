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
	if($_COOKIE['balls']){
		$template = file_get_contents('print.html');
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
			$template = str_replace('{'.$k.'}', 'class="active"', $template);
		}

		$template = str_replace('{balls}', $_COOKIE['balls'], $template);
		$template = str_replace('{pow}', $vars['pow'], $template);
		
		$template = preg_replace('/{[\w\/\?\:]+}/','', $template);
		file_put_contents('pdf/content_'.$token.'.html', $template);
		
		echo $template;
		die();
	} else {
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}