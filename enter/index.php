<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	global $index;
	global $doctors;
	global $USER;
	$index = true;
	$APPLICATION->SetTitle("Lilly Answers That Matter");
	$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, профилактика эректильной дисфункции, профилактика ДГПЖ, проблема мочеиспускания");
	$APPLICATION->SetPageProperty('DESCRIPTION', "Сайт о проблеме эректильной дисфункции и гиперплазии предстательной железы: что это такое, причины, симптомы, лечение. ");
?>
<div id="fullwidth-list" class="<?=($_REQUEST['f']==1?"overlay":'')?>">
<div class="row">
	<?=($_REQUEST['f']==1?"":"<div class='col-lg-9 col-xs-8'>")?>
		<h1><?=(isset($_REQUEST['v'])?"Как мужчины решают проблемы в постели? <br>Ответ в ролике!":"Мучают проблемы в постели? <br>Очень простое решение — в ролике!")?></h1>
		<?=($_REQUEST['f']==1?"<div class='video-frame'>":"")?>
		<?=($_REQUEST['f']==1?'<div class="embed-responsive embed-responsive-16by9">':"")?>
		<iframe src="//player.vimeo.com/video/<?=(isset($_REQUEST['v'])?"112069684":"110882748")?>?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<?=($USER->isAdmin()?"0":"1")?>" width="100%" height="516" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		<?=($_REQUEST['f']==1?'</div>':"")?>
	
	<?=($_REQUEST['f']==1?"":'</div><div class="col-lg-3 col-xs-4">')?>
		<div class="landing">
			<a data-toggle="modal" data-target="#doctor" onClick="_gaq.push(['_trackEvent', 'Doctors', 'LandingClick', 'Docs Click Landing']);" class="locator">
				<img src="/layout/images/locator.png" alt="">
			</a>
			<div class="enter2 index">
				<div class="title">
					<span>Вход</span>
					<span>для специалистов </span>
					<span>здравоохранения</span>
				</div>

				<div class="b-frame" css="" style="opacity: 1;">
					<div class="checkbox"></div>
					<a href="/doctors/" class="no-ajax">Войти</a>
				</div>

				<p>Вход для специалистов здравоохранения. Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения – медицинских 
				и фармацевтических работников. </p>

				<p>Если Вы не являетесь специалистом здравоохранения, в соответствии 
				с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.</p>
				<p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВОЙТИ», чтобы начать работу.</p>
			</div>
			
		</div>
	<?=($_REQUEST['f']==1?"":'</div>')?>
</div>

	<div class="row">
		<div class="col-md-12">
			
			<div style="height:13px;width:100%"></div>
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"promo",
				Array(
					"IBLOCK_TYPE" => "content",
					"IBLOCK_ID" => "1",
					"NEWS_COUNT" => "30",
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
<style>
	.flag {
		margin-top: 150px;
	}
	#toolbar .container {
		max-width: none !important;
		width: 100%;
		padding: 0 20px;
	}

</style>
<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>