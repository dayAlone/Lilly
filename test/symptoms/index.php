<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Картасимптомов :: Lilly Answers That Matter");
$APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, симптомы эректильной дисфункции, причины эректильной дисфункции,  курение и эрекция, алкоголь и эрекция, половой акт, секс и потенция, тест эрекции, тестирование потенции, оценка эрекции, консультация уролога");
$APPLICATION->SetPageProperty('DESCRIPTION', "");
?> 
<div class="container">
	<div id="symtpoms">
		<div class="row">
			<div class="col-md-7">
				<div class="frame">
					<div class="scroll">
						<div class="section" data-id="1">
							<h1>Сексуальная жизнь</h1>
							<div class="question" data-id="1">
								<h2>Довольны ли вы своей сексуальной жизнью?</h2>
								<ul>
									<li>
										<input type="radio" name="q1" id="a_1_1"> <label for="a_1_1">да, все отлично</label>
									</li>
									<li>
										<input type="radio" name="q1" id="a_1_2"> <label for="a_1_2">да, но кое-что хотелось бы изменить</label>
									</li>
									<li>
										<input type="radio" name="q1" id="a_1_3"> <label for="a_1_3">нет, бывают проблемы</label>
									</li>
									<li>
										<input type="radio" name="q1" id="a_1_4"> <label for="a_1_4">устал заранее планировать секс</label>
									</li>
								</ul>
							</div>
							<div class="question" data-id="2">
								<h2>Как часто вы занимаетесь сексом?</h2>
								<ul>
									<li>
										<input type="radio" name="q2" id="a_2_1"> <label for="a_2_1">каждый день</label>
									</li>
									<li>
										<input type="radio" name="q2" id="a_2_2"> <label for="a_2_2">несколько раз в неделю</label>
									</li>
									<li>
										<input type="radio" name="q2" id="a_2_3"> <label for="a_2_3">раз в неделю</label>
									</li>
									<li>
										<input type="radio" name="q2" id="a_2_4"> <label for="a_2_4">несколько раз в месяц</label>
									</li>
									<li>
										<input type="radio" name="q2" id="a_2_5"> <label for="a_2_5">по-разному, бывают длительные воздержания</label>
									</li>
									<li>
										<input type="radio" name="q2" id="a_2_6"> <label for="a_2_6">давно не было</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="section" data-id="2">
							<h1>Нарушения мочеиспускания.</h1>
							<div class="question" data-id="3">
								<h2>За последний месяц я наблюдаю:<br><small>(возможны несколько вариантов ответов)</small></h2>
								<ul>
									<li>
										<input type="checkbox" name="q3" id="a_3_1"> <label for="a_3_1">частые или настойчивые позывы к мочеиспусканию</label>
									</li>
									<li>
										<input type="checkbox" name="q3" id="a_3_2"> <label for="a_3_2">струя слабая или прерывистая</label>
									</li>
									<li>
										<input type="checkbox" name="q3" id="a_3_3"> <label for="a_3_3">по ощущению нужно напрягаться во время мочеиспускания</label>
									</li>
									<li>
										<input type="checkbox" name="q3" id="a_3_4"> <label for="a_3_4">часто хожу в туалет ночью</label>
									</li>
									<li>
										<input type="checkbox" name="q3" id="a_3_5"> <label for="a_3_5">после мочеиспускания остается ощущение неполноты опорожнения мочевого пузыря</label>
									</li>
								</ul>
							</div>
							<div class="question" data-id="4">
								<h2>Когда вы заметили изменения?</h2>
								<ul>
									<li>
										<input type="radio" name="q4" id="a_4_1"> <label for="a_4_1">меньше месяца назад</label>
									</li>
									<li>
										<input type="radio" name="q4" id="a_4_2"> <label for="a_4_2">1-2 месяца назад</label>
									</li>
									<li>
										<input type="radio" name="q4" id="a_4_3"> <label for="a_4_3">2-6 месяцев назад</label>
									</li>
									<li>
										<input type="radio" name="q4" id="a_4_4"> <label for="a_4_4">полгода-год назад</label>
									</li>
									<li>
										<input type="radio" name="q4" id="a_4_5"> <label for="a_4_5">более года назад</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="section" data-id="3">
							<h1>Образ жизни.</h1>
							<div class="question" data-id="5">
								<h2>Как можно охарактеризовать ваш образ жизни?</h2>
								<ul>
									<li>
										<input type="radio" name="q5" id="a_5_1"> <label for="a_5_1">много времени провожу сидя (работа, транспорт...)</label>
									</li>
									<li>
										<input type="radio" name="q5" id="a_5_2"> <label for="a_5_2">думаю, у меня сбалансированное соотношение сидячего образа жизни и движения</label>
									</li>
									<li>
										<input type="radio" name="q5" id="a_5_3"> <label for="a_5_3">много хожу, бегаю</label>
									</li>
									<li>
										<input type="radio" name="q5" id="a_5_4"> <label for="a_5_4">регулярно занимаюсь спортом</label>
									</li>
								</ul>
							</div>
							<div class="question" data-id="6">
								<h2>Есть ли у вас дополнительные физические нагрузки? <br><small>(возможны несколько вариантов ответов)</small></h2>
								<ul>
									<li>
										<input type="checkbox" name="q8" id="a_8_1"> <label for="a_8_1">нет</label>
									</li>
									<li>
										<input type="checkbox" name="q8" id="a_8_2"> <label for="a_8_2">да, зарядка по утрам</label>
									</li>
									<li>
										<input type="checkbox" name="q8" id="a_8_3"> <label for="a_8_3">регулярно бегаю/езжу на велосипеде/играю в футбол</label>
									</li>
									<li>
										<input type="checkbox" name="q8" id="a_8_4"> <label for="a_8_4">занимаюсь спортом на любительском уровне</label>
									</li>
									<li>
										<input type="checkbox" name="q8" id="a_8_5"> <label for="a_8_5">я - профессиональный спортсмен</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="section" data-id="4">
							<h1>Ваше самоощущение.</h1>
							<div class="question" data-id="7">
								<h2>Как сильно вы устаете на работе?</h2>
								<ul>
									<li>
										<input type="radio" name="q6" id="a_6_1"> <label for="a_6_1">у меня легкая работа</label>
									</li>
									<li>
										<input type="radio" name="q6" id="a_6_2"> <label for="a_6_2">несильно, хватает энергии на любимые дела</label>
									</li>
									<li>
										<input type="radio" name="q6" id="a_6_3"> <label for="a_6_3">серьезно устаю, иногда не хватает сил на подругу и себя самого</label>
									</li>
									<li>
										<input type="radio" name="q6" id="a_6_4"> <label for="a_6_4">очень сильно, сил хватает только чтобы добраться до дивана и заснуть</label>
									</li>
								</ul>
							</div>
							<div class="question" data-id="8">
								<h2>Есть ли у вас увлечения, хобби?</h2>
								<ul>
									<li>
										<input type="radio" name="q7" id="a_7_1"> <label for="a_7_1">работа и есть мое хобби</label>
									</li>
									<li>
										<input type="radio" name="q7" id="a_7_2"> <label for="a_7_2">нет, ничем не увлекаюсь</label>
									</li>
									<li>
										<input type="radio" name="q7" id="a_7_3"> <label for="a_7_3">да, есть хобби</label>
									</li>
									<li>
										<input type="radio" name="q7" id="a_7_4"> <label for="a_7_4">есть и не одно, я активный человек</label>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>	
			<div class="col-md-5">
				<div id="result">
					<h2>карта симптомов</h2>
					<div class="section r1">
						<h3>Сексуальная жизнь</h3>
					</div>
					<div class="section r2">
						<h3>Нарушения мочеиспускания</h3>
					</div>
					<div class="section r3">
						<h3>Образ жизни</h3>
					</div>
					<div class="section r4">
						<h3>Ваше самоощущение</h3>
					</div>
				</div>
				<div id="buttons">
					<div class="row">
						<div class="col-md-4">
							<a href="#">Файл<br>для печати</a>
						</div>
						<div class="col-md-4">
							<a class="find" href="#">Найти врача</a>
						</div>
						<div class="col-md-4">
							<a href="#">Узнать<br>о проблеме</a>
						</div>
					</div>
				</div>
			</div>
		</div>		

    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>