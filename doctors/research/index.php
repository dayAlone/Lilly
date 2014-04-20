<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Исследования :: Lilly Answers That Matter");
?> 
	<div id="research">
      <div class="container">
         <?
            $APPLICATION->IncludeComponent("bitrix:news.list", "research", array(
            	"IBLOCK_TYPE" => "content",
            	"IBLOCK_ID" => "3",
            	"NEWS_COUNT" => "999",
            	"SORT_BY1" => "SORT",
            	"SORT_ORDER1" => "ASC",
            	"SORT_BY2" => "",
            	"SORT_ORDER2" => "",
            	"FILTER_NAME" => "",
            	"FIELD_CODE" => array(
            		0 => "XML_ID",
            		1 => "NAME",
            		2 => "PREVIEW_TEXT",
            		3 => "PREVIEW_PICTURE",
            		4 => "",
            	),
            	"PROPERTY_CODE" => array(
            		0 => "DESCRIPTION",
            		1 => "FILE",
            		2 => "",
            		3 => "",
            	),
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
            	"PARENT_SECTION" => $arSect["ID"],
            	"PARENT_SECTION_CODE" => ($arSect["ID"]>0?"":"man"),
            	"INCLUDE_SUBSECTIONS" => "N",
            	"PAGER_TEMPLATE" => "",
            	"DISPLAY_TOP_PAGER" => "N",
            	"DISPLAY_BOTTOM_PAGER" => "Y",
            	"PAGER_TITLE" => "Новости",
            	"PAGER_SHOW_ALWAYS" => "Y",
            	"PAGER_DESC_NUMBERING" => "N",
            	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            	"PAGER_SHOW_ALL" => "Y",
            	"AJAX_OPTION_ADDITIONAL" => ""
            	),
            	false
            );
         ?>
      </div>
   </div>
<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>