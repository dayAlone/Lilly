<?
	global $nav;
	global $index;
	$index = true;
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

<div class="embed-responsive embed-responsive-16by9">
	<iframe src="//player.vimeo.com/video/86238673?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;color=d11414&amp;autoplay=<? 
	global $USER;
	if($USER->isAdmin()) echo 0;
	else echo 1;
	?>" width="851" height="478" style="margin-bottom: 10px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<div style="height:20px;width:100%;float:left;"></div>
<?php
    $APPLICATION->IncludeComponent("bitrix:news.list", "promo2", 
    array(
    "IBLOCK_ID"           => 1,
    "NEWS_COUNT"          => "5",
    "SORT_BY1"            => "SORT",
    "SORT_ORDER1"         => "ASC",
    "FIELD_CODE" => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
	"PROPERTY_CODE" => array("AUTHOR","HTML_TITLE"),
    "PROPERTY_CODE"       => "",
    "DETAIL_URL"          => "/news/#SECTION_ID#/#ELEMENT_ID#/",
    "CACHE_TYPE"          => "A",
    "DISPLAY_PANEL"       => "N",
    "PARENT_SECTION"      => "",
    "PARENT_SECTION_CODE" => "index",
    "SET_TITLE"           => "N"
       ),
       false
    );
?>
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
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
