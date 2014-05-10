<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Записи научных трансляций :: Lilly Answers That Matter");
	if(!$_REQUEST['ELEMENT_CODE']):
?> 
	<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", ".default", array(
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
			0 => "UF_SOON",
			1 => "UF_PARTS",
			2 => "UF_TIME",
		),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"ADD_SECTIONS_CHAIN" => "Y"
		),
		false
	);?>
<?
	else:
		$APPLICATION->IncludeComponent("bitrix:news.detail", ".default", array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "4",
			"ELEMENT_ID" => "",
			"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
			"CHECK_DATES" => "Y",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "HTML_TITLE",
				1 => "AUTHOR",
				2 => "VIDEO",
				3 => "FULLWIDTH",
				4 => "",
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
			"SET_STATUS_404" => "N",
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
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);
	endif;
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>