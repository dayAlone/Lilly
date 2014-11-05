<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	global $index;
	$index = true;
	$APPLICATION->SetTitle("Lilly Answers That Matter");
	$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, профилактика эректильной дисфункции, профилактика ДГПЖ, проблема мочеиспускания");
	$APPLICATION->SetPageProperty('DESCRIPTION', "Сайт о проблеме эректильной дисфункции и гиперплазии предстательной железы: что это такое, причины, симптомы, лечение. ");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="embed-responsive embed-responsive-16by9">
			<iframe src="//player.vimeo.com/video/110882748?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<? 
			global $USER;
			if($USER->isAdmin()) echo 0;
			else echo 1;
			?>" width="851" height="478" style="margin-bottom: 10px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<div style="height:13px;width:100%"></div>
			<?
			global $f;
			$f = array('ID'=>array(8,111,42));
			$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"promo3",
				Array(
					"IBLOCK_TYPE" => "content",
					"IBLOCK_ID" => "1",
					"NEWS_COUNT" => "3",
					"SORT_BY1" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_BY2" => "",
					"SORT_ORDER2" => "",
					"FILTER_NAME" => "f",
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
					"PARENT_SECTION_CODE" => "",
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
			<div id="map">
				<div class="frame">
					<div class="shadow">
					</div>
					<div class="content">
						<div class="title">
							 Мужской выбор
						</div>
						<p>
							 Вам осталось только выбрать удобное вам время и место встречи <br>
							 с врачом с помощью нашего онлайн-сервиса «Доктор-Локатор»!
						</p>
						<div class="form">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</div>
<?
	//endif;
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>


<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>