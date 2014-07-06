<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта симптомов :: Lilly Answers That Matter");
$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции,  курение и эрекция, алкоголь и эрекция, половой акт, секс и потенция, тест эрекции, тестирование потенции, оценка эрекции, консультация уролога");
$APPLICATION->SetPageProperty('DESCRIPTION', "");
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
?> 
<div class="container">
	<div id="symtpoms">
		<div class="row">
			<div class="col-md-7">
				<div class="frame">
					<div class="scroll">
						<?
							$JSON = (array)json_decode(file_get_contents('./questions.json'));
							$s = 1;
							$col = 2;
							$q = 0;
							foreach ($JSON as $section):
								$section = (array)$section; 
								$i=0;
								?>
								<div class="section" data-id="<?=$s?>">
									<h1><?=$section['name']?></h1>
									<?
										foreach ($section['questions'] as $question):
											$question = (array)$question;
											if($i % $col == 0) {
									            if ($i != 0) echo "</div>";
									            echo "<div class=\"row\">";
									        }
											?>
												<div class="col-md-<?=12/$col?>">
													<div class="question" data-id="1">
														<h2><?=$question['name']?></h2>
														<ul>
														<?
															$a = 0;
															foreach ($question['answers'] as $key => $answer):
																$answer = iconv("UTF-8", "UTF-8//IGNORE",$answer);
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
																		<input type="radio" data-answer="<?=$w?>" name="q<?=$q?>" id="a_<?=$q?>_<?=$a?>"> <label for="a_<?=$q?>_<?=$a?>"><?=$answer?></label>
																	</li>
																<?
																$a++;
															endforeach;
														?>
														</ul>
													</div>
												</div>
											<?
										$i++;
										$q++;
										endforeach;
									?>
									</div>
								</div>
								<?
								$s++;
							endforeach;
						?>
						
					</div>
				</div>	
			</div>	
			<div class="col-md-5">
				<div id="result">
					<h2>карта симптомов</h2>
					
					<?
						$s = 1;
						foreach ($JSON as $section):
							$section = (array)$section; 
							?>
								<div class="section r<?=$s?>">
									<h3><?=$section['name']?></h3>
								</div>
							<?
							$s++;
						endforeach;
					?>
				</div>
				<div id="buttons" class="off">
					<div class="row">
						<div class="col-md-4">
							<a href="#">Файл<br>для печати</a>
						</div>
						<div class="col-md-4">
							<a class="find" data-toggle="modal" data-target="#locator" href="#locator">Найти врача</a>
						</div>
						<div class="col-md-4">
							<a href="#">Узнать<br>о проблеме</a>
						</div>
					</div>
				</div>
			</div>
		</div>		

    </div>
</div>

<div class="modal fade" id="symtpoms-welcome" tabindex="-1" role="dialog" aria-labelledby="symtpoms-welcome" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
       	<h2>КАРТА СИМПТОМОВ</h2>

		<p>Разговор с врачом – залог успешного лечения, но он бывает трудным. <br>
		Не обо всем легко сказать вслух, а некоторые важные вещи могут просто <br>
		не вспомниться. Поэтому стоит подготовиться.</p>

		<p>В этом вам поможет «Карта симптомов». Вы сможете составить ее, ответив <br>
		на вопросы небольшого теста. В ней будет отражена информация, которая пригодится врачу на приеме. Она поможет вам подготовиться к визиту 
		к врачу и может быть предоставлена непосредственно специалисту.</p>

		<p>С «Картой симптомов» вы сделаете первый шаг на пути к выздоровлению!</p>
		
		<a href="#" data-dismiss="modal">Продолжить</a>
       </div>
     </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>