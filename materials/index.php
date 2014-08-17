<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Мужской разговор :: Lilly Answers That Matter");

	if($_REQUEST['ELEMENT_CODE']) {
		CModule::IncludeModule("iblock");
		$rsSect = CIBlockSection::GetList(array(),array('CODE'=>$_REQUEST['ELEMENT_CODE']));
		$arSect = $rsSect->Fetch();

		$arSelect = Array("ID", "IBLOCK_ID");
		$arFilter = Array("CODE"=>$_REQUEST['ELEMENT_CODE']);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		$elm = $res->Fetch();
	}

	if($APPLICATION->GetCurDir()=='/materials/dysfunction/') {
		$APPLICATION->SetPageProperty('mobile_title', '<strong>Мужской разговор</strong><span>Об эректильной<br>дисфункции</span>');
		$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы");
		$APPLICATION->SetPageProperty('DESCRIPTION', "Узнать все самое важное об эректильной дисфункции: симптомы, причины, лечение, ошибки самолечения, образ жизни, профилактика");
	}
	else if($APPLICATION->GetCurDir()=='/materials/adenoma/') {
		$APPLICATION->SetPageProperty('mobile_title', '<strong>Мужской разговор</strong><span>Об аденоме<br>предстательной железы</span>');
		$APPLICATION->SetPageProperty('KEYWORDS', "гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, профилактика ДГПЖ, образ жизни при ДГПЖ, ДГПЖ и секс, диета и ДГПЖ, проблема мочеиспускаиния, предстательная железа");
		$APPLICATION->SetPageProperty('DESCRIPTION', "Узнать все самое важное о доброкачественной дисплазии предстательной железы: симптомы, причины, методы лечения, профилактика");	
	}
	else {
		$APPLICATION->SetPageProperty('mobile_title', '<strong class="bottom">Мужской разговор</strong>');
		$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, мнение уролога, курение и эрекция, алкоголь и эрекция,");
		$APPLICATION->SetPageProperty('DESCRIPTION', "Мужской разговор о мужском здоровье. Статьи и интервью об эректильной дисфункции и ДГПЖ: симптомы, причины, лечение, ошибки самолечения.");
	}
?><?
 if(!$_REQUEST['ELEMENT_CODE']||!$elm)
	$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"promo",
		Array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "1",
			"NEWS_COUNT" => "100",
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
			"PARENT_SECTION_CODE" => ($_REQUEST['ELEMENT_CODE']?$_REQUEST['ELEMENT_CODE']:""),
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
		));
else
	$APPLICATION->IncludeComponent("bitrix:news.detail","",Array(
		"IBLOCK_ID"     => $elm['IBLOCK_ID'],
		"IBLOCK_TYPE"   => "content",
		"ELEMENT_CODE"  => $_REQUEST["ELEMENT_CODE"],
		"CHECK_DATES"   => "Y",
		"FIELD_CODE"    => Array("ID"),
		"PROPERTY_CODE" => Array("HTML_TITLE","AUTHOR","VIDEO","FULLWIDTH","PARENT"),
	));
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>