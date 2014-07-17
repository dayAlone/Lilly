<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Cубъективная оценка эд :: Lilly Answers That Matter");
$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции,  курение и эрекция, алкоголь и эрекция, половой акт, секс и потенция, тест эрекции, тестирование потенции, оценка эрекции, консультация уролога");
$APPLICATION->SetPageProperty('DESCRIPTION', "Протестировать свою эрекцию: субъективная оценка эректильной дисфункции.");

?> 
<div class="container test_container">
	<div class="col-md-6 col-md-offset-3">
		<div id="test-man">
	   <div id="wrapper" class="default">
        <div class="test_frame">
            <h2>Cубъективная оценка ЭД*</h2>
            <p id="pretest_small">Выберите вариант, который наиболее точно соответствует Вашему ответу</p>
        </div>
        <div class="test_content man">
            <div id="pretest_block">
                <div class="questions" id="q_00">
                    <h3>Насколько Вы удовлетворены Вашей сексуальной жизнью на данный момент?</h3>
                    <ol>
                        <li><input type="radio" name="q_00" id="q_00_1" value="" /><label for="q_00_1">Абсолютно не удовлетворен</label></li>
                        <li><input type="radio" name="q_00" id="q_00_2" value="" /><label for="q_00_2">Скорее не удовлетворен</label></li>
                        <li><input type="radio" name="q_00" id="q_00_3" value="" /><label for="q_00_3">Нечто среднее между удовлетворен и не удовлетворен</label></li>
                        <li><input type="radio" name="q_00" id="q_00_4" value="" /><label for="q_00_4">Скорее удовлетворен</label></li>
                        <li><input type="radio" name="q_00" id="q_00_5" value="" /><label for="q_00_5">Абсолютно удовлетворен</label></li>
                    </ol>
                </div>
            </div>
            <h2>Оценка эректильной функции*</h2>
            <div id="test_block">
                <div class="questions" id="q_0">
                    <h3>
                        <span class="counter"><span class="digit">1</span></span>
                        Как часто Вы можете достигнуть эрекции во время полового акта?
                    </h3>
                    <ol>
                        <li><input type="radio" name="q_0" id="q_0_1" value="" /><label for="q_0_1">Почти никогда или никогда</label></li>
                        <li><input type="radio" name="q_0" id="q_0_2" value="" /><label for="q_0_2">Несколько раз (гораздо реже, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_0" id="q_0_3" value="" /><label for="q_0_3">Иногда (примерно в половине случаев)</label></li>
                        <li><input type="radio" name="q_0" id="q_0_4" value="" /><label for="q_0_4">Часто (гораздо чаще, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_0" id="q_0_5" value="" /><label for="q_0_5">Почти всегда или всегда</label></li>
                    </ol>
                </div>
                <div class="questions" id="q_1">
                    <h3>
                        <span class="counter"><span class="digit">2</span></span>
                        Когда у Вас возникает эрекция во <br>время сексуального возбуждения, как часто она достаточна для введения полового члена во влагалище?
                    </h3>
                    <ol>
                        <li><input type="radio" name="q_1" id="q_1_1" value="" /><label for="q_1_1">Почти никогда или никогда</label></li>
                        <li><input type="radio" name="q_1" id="q_1_2" value="" /><label for="q_1_2">Несколько раз (гораздо реже, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_1" id="q_1_3" value="" /><label for="q_1_3">Иногда (примерно в половине случаев)</label></li>
                        <li><input type="radio" name="q_1" id="q_1_4" value="" /><label for="q_1_4">Часто (гораздо чаще, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_1" id="q_1_5" value="" /><label for="q_1_5">Почти всегда или всегда</label></li>
                    </ol>
                </div>
                <div class="questions" id="q_2">
                    <h3>
                        <span class="counter"><span class="digit">3</span></span>
                        Как часто во время полового акта <br>Вы в состоянии поддерживать эрекцию после введения члена <br>во влагалище?
                    </h3>
                    <ol>
                        <li><input type="radio" name="q_2" id="q_2_1" value="" /><label for="q_2_1">Почти никогда или никогда</label></li>
                        <li><input type="radio" name="q_2" id="q_2_2" value="" /><label for="q_2_2">Несколько раз (гораздо реже, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_2" id="q_2_3" value="" /><label for="q_2_3">Иногда (примерно в половине случаев)</label></li>
                        <li><input type="radio" name="q_2" id="q_2_4" value="" /><label for="q_2_4">Часто (гораздо чаще, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_2" id="q_2_5" value="" /><label for="q_2_5">Почти всегда или всегда</label></li>
                    </ol>
                </div>
                <div class="questions" id="q_3">
                    <h3>
                        <span class="counter"><span class="digit">4</span></span>
                        Во время полового акта как сложно бывает поддерживать эрекцию до завершения акта?
                    </h3>
                    <ol>
                        <li><input type="radio" name="q_3" id="q_3_1" value="" /><label for="q_3_1">Чрезвычайно трудно</label></li>
                        <li><input type="radio" name="q_3" id="q_3_2" value="" /><label for="q_3_2">Очень трудно</label></li>
                        <li><input type="radio" name="q_3" id="q_3_3" value="" /><label for="q_3_3">Трудно</label></li>
                        <li><input type="radio" name="q_3" id="q_3_4" value="" /><label for="q_3_4">Не очень трудно</label></li>
                        <li><input type="radio" name="q_3" id="q_3_5" value="" /><label for="q_3_5">Легко</label></li>
                    </ol>
                </div>
                <div class="questions" id="q_4">
                    <h3>
                        <span class="counter"><span class="digit">5</span></span>
                        Насколько часто Вы испытываете удовлетворение от полового акта?
                    </h3>
                    <ol>
                        <li><input type="radio" name="q_4" id="q_4_1" value="" /><label for="q_4_1">Почти никогда или никогда</label></li>
                        <li><input type="radio" name="q_4" id="q_4_2" value="" /><label for="q_4_2">Несколько раз (гораздо реже, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_4" id="q_4_3" value="" /><label for="q_4_3">Иногда (примерно в половине случаев)</label></li>
                        <li><input type="radio" name="q_4" id="q_4_4" value="" /><label for="q_4_4">Часто (гораздо чаще, чем в половине случаев)</label></li>
                        <li><input type="radio" name="q_4" id="q_4_5" value="" /><label for="q_4_5">Почти всегда или всегда</label></li>
                    </ol>
                </div>
            </div>
        
        <div id="result_block"></div>
        <p class="small">*Международный индекс эректильной <br>функции – МИЭФ5</p>
        <div id="footer">
        <p>Обратите внимание, полноценно интерпретировать результаты этого теста сможет только Ваш лечащий врач, поэтому не стоит заниматься самолечением, обратитесь к врачу!</p>
        <h3 class="red">В большинстве случаев эректильная дисфункция поддаётся лечению!</h3>
        </div>
    </div>
    

    </div>
    
    <div class="locator-frame">
        <a href="#locator" class="doctor" data-toggle="modal" data-target="#locator">узнать у врача</a>    
    </div>
    
    
    <script src="/test_man/js/script.js" type="text/javascript"></script>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>