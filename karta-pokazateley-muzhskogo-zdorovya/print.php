<? 
//if(isset($_COOKIE['test_result'])): 
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <meta name="viewport" content="width=850, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="format-detection" content="telephone=no">

    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=Bh6DI5ReSHIvsQsemv1SLKV6jKW8*qviv*I2ezvg/tqn4jZ439vgbfkzR2dG26Go/i4c*k6YC/B9MYPQWEEndGWVz/h81y8wBJjErUivrgccc5*4bzV4R7pAEENut9J/C8TyNd1rlJDD78OlhjcsIrNKOogMjYcoqSHHRNmNgbo-';</script>
    <link href="/layout/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/layout/css/plugins.css" rel="stylesheet" />
	<link href="/layout/css/style.css" rel="stylesheet" />
 	<script type="text/javascript" src="/layout/js/jquery.js"></script>
     <script type="text/javascript" src="/layout/js/plugins.min.js"></script>
     <script type="text/javascript" src="/layout/js/main.js"></script>
     <script type="text/javascript" charset="utf-8" async defer>
     $(function(){
     	//$.removeCookie('test_result')
     })
     </script>
  </head>

  <body id="print">
  <div class="container">
  	<div class="title">
  		<div class="logo"><img src="/layout/images/logo.png" width="90"></div>
  		<?if(isset($_COOKIE['test_result'])): ?>
  		<h1>Карта показателей мужского здоровья</h1>
		<p>Поздравляем, вы сделали первый шаг на пути выздоровлению. Уверенно отправляйтесь на консультацию со специалистом и захватите “Карту показателей мужского здоровья” с собой!</p>
		<? endif; ?>
  	</div>
  	<?if(isset($_COOKIE['test_result'])): ?>
  	<div class="questions">
	<?
		if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
		{
		    /**
		     * mb_ucfirst - преобразует первый символ в верхний регистр
		     * @param string $str - строка
		     * @param string $encoding - кодировка, по-умолчанию UTF-8
		     * @return string
		     */
		    function mb_ucfirst($str, $encoding='UTF-8')
		    {
		        $str = mb_ereg_replace('^[\ ]+', '', $str);
		        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
		               mb_substr($str, 1, mb_strlen($str), $encoding);
		        return $str;
		    }
		}
		$JSON = json_decode(file_get_contents('./questions.json'), TRUE);
		$select = json_decode($_COOKIE['test_result'], TRUE);
		foreach ($select as $ak => $section):
			if (count($section['questions'])>0):
			?>
			<div class="section">
				<h2><?=$section['name']?></h2>
				<?
					foreach ($section['questions'] as $bk => $question):
							$answ = @$JSON[$ak]['questions'][$bk];
							?><ul><?
							
							$array = preg_split("/[\s,]+/", $question);
							$w = "";
							
							/*if(is_array($answ['results'])) {
								if(count($array)>1) {
									foreach ($array as $value)
										$w .= mb_ucfirst(strtolower($answ['results'][$value]))." ";
								}
								else
									$w = $answ['results'][$question];
							}
							else {*/
								$q = "";
								if(count($array)>1) {
									$tmp = array();
									foreach ($array as $value)
										$tmp[] = $answ['answers'][$value];
									$q = implode(", ", $tmp);
								}
								else 
									$q = $answ['answers'][$question];

								$u = mb_ucfirst(strtolower($q));
								
								$w = $answ['name'].' <strong>'.$u."</strong>.";

								$pattern = '/(<small>(.*)<\/small>)/i';
	   							$w = preg_replace($pattern, "", $w);
								/*$r = array("#answer#", "#tanswer#");
								$p = array($q, $u);
								$w = str_ireplace($r, $p, $answ['results']);*/
							//}
							
							?>
								<li>
									<?=$w?>
								</li>
							</ul><?
					endforeach;
				?>
			</div>
			<?
			endif;
		endforeach;
	?>
	</div>
	<? endif; ?>
	<div class="more">
		<h1></h1>
		<p>Чтобы предоставить врачу все необходимые для лечения сведения, ответьте, пожалуйста, на следующие вопросы: </p>
		<h4>1. Укажите названия лекарств, которые вы принимаете регулярно.</h4>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<h4>2. Укажите хронические заболевания или особенности вашего здоровья, если таковые есть.</h4>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<h4>3. Что еще вас беспокоит?</h4>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</div>
</div>
</body>
<? 

//endif;
?>