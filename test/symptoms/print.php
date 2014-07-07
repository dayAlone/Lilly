<? if($_COOKIE['test_result']): ?>
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
 
  </head>

  <body id="print">
  <div class="container">
  	<div class="title">
  		<div class="logo"><img src="/layout/images/logo.png" width="90"></div>
  		<h1>Карта показателей мужского здоровья</h1>
		<p>Покажите Карту врачу или ориентируйтесь на нее при разговоре с ним.</p>
  	</div>
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
		$JSON = (array)json_decode(file_get_contents('./questions.json'));
		$select = json_decode($_COOKIE['test_result'], TRUE);
		$s = 1;
		$col = 2;
		$q = 0;
		foreach ($JSON as $section):
			$section = (array)$section; 
			$i=0;
			?>
			<div class="section" data-id="<?=$s?>">
				<h2><?=$section['name']?></h2>
				<?
					foreach ($section['questions'] as $question):
						$question = (array)$question;
						
							$a = 0;
							$answ = @$select[$s]['questions'][$i];
							?><ul><?
							foreach ($question['answers'] as $key => $answer):
								
								if($a == $answ):
									if(is_array($question['results']))
										$w = $question['results'][$key];
									else {
										$r = array("#answer#", "#tanswer#");
										$u = mb_ucfirst(strtolower($answer));
										$p = array($answer, $u);
										$w = str_ireplace($r, $p, $question['results']);
									}
								?>
									<li>
										<?=$w?>
									</li>
								<?
								endif;
								$a++;
							endforeach;
							?></ul><?
					$i++;
					$q++;
					endforeach;
				?>
			</div>
			<?
			$s++;
		endforeach;
	?>
	<div class="more">
		<div class="logo"><img src="/layout/images/logo.png" width="90"></div>
		<h1></h1>
		<p>Чтобы предоставить врачу все необходимые для лечения сведения, ответьте, пожалуйста, на следующие вопросы: </p>
		<h4>1. Если вы регулярно принимаете лекарства, укажите их названия и дозировку. </h4>
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
<? endif;?>