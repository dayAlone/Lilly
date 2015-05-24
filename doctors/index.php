<?
	global $nav;
	$nav='white';
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
   $APPLICATION->SetPageProperty('body_class', "dark");
	$APPLICATION->SetTitle("Lilly Answers That Matter");
   $APPLICATION->SetPageProperty('KEYWORDS', "эректильная дисфункция, эрекция, мужское здоровье, сексуальное здоровье, лечение эрекции, проблемы эрекции, лечение эректильной дисфункции, гиперплазия предстательной железы, ДГПЖ, аденома предстательной железы, лечение гиперплазии предстательной железы, для врачей, медицинский специалист, сиалис, сиалис 5мг, сиалис 20 мг, тадалафил");
   $APPLICATION->SetPageProperty('DESCRIPTION', "Сиалис® – эффективное и безопасное решение проблемы эректильной дисфункции и доброкачественной гиперплазии предстательной железы.");
   $APPLICATION->SetPageProperty('mobile_title', '<strong class="bottom">О препарате</strong>');
?> 
	<div id="products-promo">
      <div class="container">
         <h1>Сиалис<sup>®</sup> — эффективное и безопасное решение</h1>
         <div class="row">
            <div class="col-md-8">
               <div id="video">
                  <iframe src="//player.vimeo.com/video/75777386?title=0&amp;byline=0&amp;portrait=0&api=1&player_id=vimeoplayer&color=d11414" width="549" height="413" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <div class="icon" onclick="_gaq.push(['_trackEvent', 'DUPVideo', 'PlayDUP', 'DUP Video Play']);"></div>
               </div>
            </div>
            <div class="col-md-4">
               <div id="product-1">

                  <p>Сиалис<sup>®</sup> — одно решение двух проблем: восстанавливает эректильную функцию и улучшает мочеиспускание у мужчин с доброкачественной гиперплазией предстательной железы.<br><a href="/upload/сialis5.pdf" class="no-ajax">ИНСТРУКЦИЯ</a></p>
                  
                  <a href="/doctors/5mg/" onclick="_gaq.push(['_trackEvent', 'CialisInfo', '5mg', '5mg Info']);"><img src="/layout/images/p-1.png" alt=""></a>
               </div>
               <div id="product-2">

                  <p>Сиалис<sup>®</sup> позволяет мужчине улучшить качество сексуального здоровья и вернуться к жизни без эректильной дисфункции.<br><a class="no-ajax" href="/upload/сialis20.pdf">ИНСТРУКЦИЯ</a></p>
                  
                  <a href="/doctors/20mg/" onclick="_gaq.push(['_trackEvent', 'CialisInfo', '20mg', '20mg Info']);"><img src="/layout/images/p-2.png" alt=""></a>
               </div>
            </div>
         </div>

         <div class="links">
            <a href="https://itunes.apple.com/ru/app/lilly-medinfo/id531654779?mt=8" target="_blank"><img width="135" src="/layout/images/apple.png" alt=""></a>
            <?/*<a href=" https://play.google.com/store/apps/details?id=tr.com.lilly.medinfoandroid" class="border" target="_blank"><img height="40" src="/layout/images/googleplay.png" alt=""></a>*/?>
         </div>
      </div>
   </div>
<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>