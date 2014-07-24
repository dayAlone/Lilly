<?
@define("ERROR_404","Y"); 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Cубъективная оценка эд :: Lilly Answers That Matter");
$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции,  курение и эрекция, алкоголь и эрекция, половой акт, секс и потенция, тест эрекции, тестирование потенции, оценка эрекции, консультация уролога");
$APPLICATION->SetPageProperty('DESCRIPTION', "Протестировать свою эрекцию: субъективная оценка эректильной дисфункции.");
?> 
<div class="container test_container">
	<div class="col-md-6 col-md-offset-3">
    	<div id="test-man" style="min-height: 500px">
    	   <div id="wrapper" class="default">
                <div class="test_content man">
                    <div id="test_block">
                        <div class="questions" id="q_0">
                            <h3 style="background-size: auto 100%; background-color: #d11414;">
                                <span class="counter"><span style="width: 500px;float: left;text-align: left;" class="digit">Ошибка 404</span></span>
                            </h3>
                            <h2>Запрашиваемая страница не найдена</h2>
                            <p><a href="/"><u>Перейти на главную</u></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>