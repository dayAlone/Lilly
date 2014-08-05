<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта показателей мужского здоровья :: Lilly Answers That Matter");
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
										foreach ($section['questions'] as $c => $question):
											$question = (array)$question;
											if($i % $col == 0) {
									            if ($i != 0) echo "</div>";
									            echo "<div class=\"row\">";
									        }
											?>
												<div class="col-md-<?=12/$col?>">
													<div class="question <?=(isset($question['multy'])?"multy":"")?> q-<?=$q?>" data-id="<?=$q?>" data-count="<?=$c?>">
														<h2><?=$question['name']?> </h2>
														<ul>
														<?
															$a = 0;
															foreach ($question['answers'] as $key => $answer):
																$answer = iconv("UTF-8", "UTF-8//IGNORE",$answer);
																if(is_array($question['results']))
																	$w = $question['results'][$key];
																else if(isset($question['multy'])) {
																	$w = $question['results'];
																}
																else {
																	$r = array("#answer#", "#tanswer#");
																	$u = mb_ucfirst(strtolower($answer));
																	$p = array($answer, $u);
																	$w = str_ireplace($r, $p, $question['results']);
																}
																?>
																	<li>
																		<input type="<?=(isset($question['multy'])?"checkbox":"radio")?>" data-text="<?=$answer?>" data-answer="<?=$w?>" data-id="<?=$a?>" name="q<?=$q?>" id="a_<?=$q?>_<?=$a?>"> <label for="a_<?=$q?>_<?=$a?>"><?=$answer?></label>
																	</li>
																<?
																$a++;
															endforeach;
														?>
															<li>
																<input type="<?=(isset($question['multy'])?"checkbox":"radio")?>" class="skip" data-id="<?=$a?>" name="q<?=$q?>" id="a_<?=$q?>_<?=$a?>"> <label for="a_<?=$q?>_<?=$a?>" class="skip">пропустить вопрос</label>
															</li>
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
					<h2>Карта показателей мужского здоровья</h2>
					
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
							<a href="./print.php" target="_blank" class="no-ajax print">Файл<br>для печати</a>
						</div>
						<div class="col-md-4">
							<a class="find" data-toggle="modal" data-target="#locator" href="#locator">Найти врача</a>
						</div>
						<div class="col-md-4">
							<a data-toggle="modal" data-target="#symptoms-articles" href="#symptoms-articles">Узнать<br>о проблеме</a>
						</div>
					</div>
				</div>
			</div>
		</div>		

    </div>
</div>

<div class="modal fade" id="symptoms-articles" tabindex="-1" role="dialog" aria-labelledby="symptoms-articles" aria-hidden="true">
     <div class="modal-dialog modal-xxl">
       <div class="modal-content">
       <a href="#" class="close" data-dismiss="modal" aria-hidden="true"></a>
       	<h3>Узнайте больше об эректильной дисфункции и аденоме предстательной железы.</h3>
       	<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"promo.popup",
			Array(
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "1",
				"NEWS_COUNT" => "3",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "",
				"SORT_ORDER2" => "",
				"FILTER_NAME" => "",
				"FIELD_CODE" => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
				"PROPERTY_CODE" => array("AUTHOR","HTML_TITLE"),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "index",
				"INCLUDE_SUBSECTIONS" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"PAGER_TEMPLATE" => "",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y"
			)
		);?>
       </div>
    </div>
</div>

<div class="modal fade" id="symptoms-welcome" tabindex="-1" role="dialog" aria-labelledby="symptoms-welcome" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
       	<h2>Карта показателей мужского здоровья</h2>

		<p>Разговор с врачом – залог успешного лечения, но он бывает трудным. <br>Не обо всем легко сказать вслух, а некоторые важные вещи могут просто <br>не вспомниться. Поэтому стоит подготовиться.</p>

		<p>В этом вам поможет «Карта показателей мужского здоровья». Вы сможете составить ее, ответив на вопросы небольшого теста. В ней будет отражена информация, которая пригодится врачу на приеме. Она поможет вам подготовиться к визиту к врачу и может быть предоставлена непосредственно специалисту.</p>

		<p>С «Картой показателей мужского здоровья» вы сделаете первый шаг на пути к выздоровлению!</p>
		
		<a href="#" data-dismiss="modal">Продолжить</a>
       </div>
     </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>