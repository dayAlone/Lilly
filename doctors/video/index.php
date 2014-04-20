<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Записи научных трансляций :: Lilly Answers That Matter");
?> 
	<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "4",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"COUNT_ELEMENTS" => "Y",
	"TOP_DEPTH" => "1",
	"SECTION_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_URL" => "",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"VIEW_MODE" => "TILE",
	"SHOW_PARENT_NAME" => "Y",
	"HIDE_SECTION_NAME" => "N"
	),
	false
);?>
<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>