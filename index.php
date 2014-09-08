<?
	global $nav;
	global $index;
	$index = true;
	if(!isset($_REQUEST['v']))
		$nav='white';
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Lilly Answers That Matter");
	$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, профилактика эректильной дисфункции, профилактика ДГПЖ, проблема мочеиспускания");
	$APPLICATION->SetPageProperty('DESCRIPTION', "Сайт о проблеме эректильной дисфункции и гиперплазии предстательной железы: что это такое, причины, симптомы, лечение. ");
?>
<div id="small-buttons">
	<div class="frame">
		<div class="row">
			<div class="col-xs-6">
				<a href="#" data-toggle="modal" data-target="#locator" onClick="_gaq.push(['_trackEvent', 'DoctorLocator', 'ConsumerClick', 'DL Click Mobile']);">Найти уролога</a>
			</div>
			<div class="col-xs-6">
				<a href="/test/man/">Пройти тест</a>
			</div>
		</div>
	</div>
</div>
<?
	if(!isset($_REQUEST['v'])):
?>
<div id="main-block" style="background-image: url(/layout/images/index_bg.jpg)">
	<div class="shadow bottom">
	</div>
	<?/*
	<? if($_REQUEST['v']==2) {?>
	<div class="video v-2">
		<iframe src="//player.vimeo.com/video/87844279?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<? 
		global $USER;
		if($USER->isAdmin()) echo 0;
		else echo 1;
		?>" width="700" height="393" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
	<?} else{?>
	*/?>
	<div class="video">
		<iframe src="//player.vimeo.com/video/86238673?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<? 
		global $USER;
		if($USER->isAdmin()) echo 0;
		else echo 1;
		?>" width="545" height="413" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"promo",
	Array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "5",
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

<?
	else:
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<iframe src="//player.vimeo.com/video/87844279?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<? 
			global $USER;
			if($USER->isAdmin()) echo 0;
			else echo 1;
			?>" width="851" height="478" style="margin-bottom: 10px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"promo2",
				Array(
					"IBLOCK_TYPE" => "content",
					"IBLOCK_ID" => "1",
					"NEWS_COUNT" => "5",
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
		<div class="col-md-3">
			<? if($_REQUEST['v']==1): ?>
			<div class="landing">
				<div class="enter index">
					<div class="title">
						<span>ВХОД ДЛЯ </span>
						<span>СПЕЦИАЛИСТОВ </span>
						<span>ЗДРАВООХРАНЕНИЯ</span>
					</div>

					<p>Вход для специалистов здравоохранения. Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения – медицинских 
					и фармацевтических работников. </p>

					<p>Если Вы не являетесь специалистом здравоохранения, в соответствии 
					с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.</p>

					<div class="frame" css="" style="opacity: 1;">
						<div class="checkbox"></div>
						<a href="/doctors" class="no-ajax">Войти</a>
					</div>


					<p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВХОД», чтобы начать работу.</p>
				</div>
			</div>
			<? else: ?>
			<? endif;?>

		</div>
	</div>

	
</div>
<?
	endif;
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>