<?
	global $nav;
	if(!isset($_REQUEST['ELEMENT_CODE']))
		$nav='white';
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Для женщин :: Lilly Answers That Matter");

?><?
 if(!$_REQUEST['ELEMENT_CODE']) {

$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, мужские проблемы женщины, женщина и эрекция, эрекция мужа, помочь мужчине");
$APPLICATION->SetPageProperty('DESCRIPTION', "У моего мужчины проблема с потенцией: что такое эректильная дисфункция, чем можно помочь и как себя вести.");
$APPLICATION->SetPageProperty('mobile_title', '<strong>Для женщин</strong><span>как помочь,<br>если у него ЭД?</span>');
 ?>

	<div id="woman">
     <div class="woman-title" style="background-image: url(/layout/images/woman.jpg)">
       <div class="shadow"></div>
       <div class="image" style="background-image: url(/layout/images/woman.jpg)">
   			<div class="shadow"></div>
   		</div>
       <div class="container">
       		
         <div class="row">
           <div class="col-md-8 col-sm-12 col-xs-12">
             <h1>Как понять, что у вашего мужчины ЭД?</h1>
              <p>Переживаете, что у вашего партнера эректильная дисфункция? Хотите быть уверены, что в вашей сексуальной жизни все в порядке? Этот несложный тест поможет понять, нужно ли вам и вашему мужчине беспокоиться из-за возможных проблем, или для тревоги нет причин.
              </p>
              <a href="/test/woman/" class="red-button">НАЧАТЬ ТЕСТ</a>
           </div>
         </div>
       </div>
     </div>
   </div>

 <?
 $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"promo.woman",
	Array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "999",
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
		"PARENT_SECTION_CODE" => "woman",
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
);
} else {
$APPLICATION->IncludeComponent("bitrix:news.detail", ".default", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "",
	"ELEMENT_ID" => "",
	"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
	"CHECK_DATES" => "Y",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"IBLOCK_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"SET_STATUS_404" => "Y",
	"SET_TITLE" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"ADD_ELEMENT_CHAIN" => "N",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"USE_PERMISSIONS" => "N",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Страница",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
}?><?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>