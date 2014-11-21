<?
	global $nav;
	global $index;
	$index = true;
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Lilly Answers That Matter");
	$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, мужское здоровье, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, симптомы гиперплазии предстательной железы, причины гиперплазии предстательной железы, лечение гиперплазии предстательной железы, профилактика эректильной дисфункции, профилактика ДГПЖ, проблема мочеиспускания");
	$APPLICATION->SetPageProperty('DESCRIPTION', "Сайт о проблеме эректильной дисфункции и гиперплазии предстательной железы: что это такое, причины, симптомы, лечение. ");
?>
<h1>Карта сайта</h1>
<?	
	$APPLICATION->IncludeComponent(
		"bitrix:main.map", 
		".default", 
		array(
			"LEVEL" => "4",
			"COL_NUM" => "1",
			"SHOW_DESCRIPTION" => "Y",
			"SET_TITLE" => "N",
			"CACHE_TIME" => "36000",
			"CACHE_TYPE" => "A"
		),
		false
	);
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
