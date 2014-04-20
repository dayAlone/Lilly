<?
	global $nav;
	$nav='white';
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Lilly Answers That Matter");

?>
<div id="main-block" style="background-image: url(/layout/images/index-bg.jpg)">
	<div class="shadow bottom">
	</div>
	<div class="video">
		<iframe src="//player.vimeo.com/video/86238673?title=0&amp;byline=0&amp;portrait=0&amp;color=d11414&amp;autoplay=<? 
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
		"CACHE_TIME" => "36000000",
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
<br><?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>