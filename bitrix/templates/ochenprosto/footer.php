<?
   global $doctors;
   function NumberEnd($number, $titles) {
    $cases = array (2, 0, 1, 1, 1, 2);
    return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
   }
?>

   <div id="footer">
      <div class="container">
         <? if($doctors):?>
         <p class="doctors">
            Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения - медицинских и фармацевтических работников. Если Вы не являетесь специалистом здравоохранения, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.
         </p>
      <? endif; ?>
         <div class="row">
            <div class="col-md-1">
               <a href="/" class="logo">
                  <img src="/layout/images/logo2.png" alt="">
               </a>
            </div>
            <div class="col-md-7 center menu">
               <div class="menu">
                  <?$APPLICATION->IncludeComponent("bitrix:menu","bottom",Array(
                        "ROOT_MENU_TYPE" => "bottom", 
                        "MAX_LEVEL" => "1", 
                        "CHILD_MENU_TYPE" => "bottom", 
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "N", 
                        "MENU_CACHE_TIME" => "3600", 
                        "MENU_CACHE_USE_GROUPS" => "Y", 
                        "MENU_CACHE_GET_VARS" => "" 
                      )
                    );?><br>
                  <span class="copyright">© Copyright ООО «Лилли Фарма» 2014. Все права защищены.</span>
               </div>
            </div>
            
            <div class="col-md-4">
               <div class="counter">
                  <nobr>
                     <? 
                      $obCache = new CPHPCache();
                      $cacheLifetime = 10800; 
                      $cacheID = 'count'-date('Y-m-d'); 
                      $cachePath = '/';
                      if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) )
                      {
                         $vars = $obCache->GetVars();
                         $count = $vars['count'];
                      }
                      elseif( $obCache->StartDataCache()  )
                      {
                         $count = include($_SERVER['DOCUMENT_ROOT'].'/include/counter.php'); 
                         $obCache->EndDataCache(array('count'=>$count));
                      }
                      
                      for($i=0;$i<strlen($count);$i++)
                        echo '<span class="n">'.$count[$i].'</span>';
                     ?>
                     <span class="t"><?=NumberEnd($count, array('человек','человека','человека'))?> <br>посетили этот сайт</span>
                  </nobr>
               </div><?/*
               <div class="search">
                  <input type="submit" value="">
                  <input type="text" placeholder="Поиск по сайту">

               </div>*/?>
            </div>
         </div>
      </div>
   </div>
</div>
   <div class="modal fade" id="locator" tabindex="-1" role="dialog" aria-labelledby="locator" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <a href="#" class="close" data-dismiss="modal" aria-hidden="true"></a>
         <p>Вы в одном шаге от инновационного инструмента ДОКТОР-ЛОКАТОР!<br>Он поможет вам найти врача-уролога в вашем городе или регионе.</p>

         <h3>ЗАПИШИТЕСЬ НА ПРИЁМ ПРЯМО СЕЙЧАС!</h3>

         <a href="http://doctorlocator.rusmh.org" target="_blank" onClick="_gaq.push(['_trackEvent', 'DoctorLocator', 'PopupClick', 'DL Popup Exit']);" class="no-ajax go">перейти</a>

         <small>Вы покидаете www.ochenprosto.ru и переходите на сайт Российского общества «Мужское здоровье». Эли Лилли энд Компани не контролирует, не поддерживает и не влияет на этот сайт. Все мнения, точки зрения или комментарии, высказанные на этом сайте, не должны приписываться Эли Лилли энд Компани. Также Эли Лилли энд Компани не несет ответственности за конфиденциальность, безопасность и сбор данных каких-либо сайтов, принадлежащих третьим сторонам.</small>



       </div>    
     </div>
   </div>
   <div class="modal fade" id="doctor" tabindex="-1" role="dialog" aria-labelledby="doctor" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <h3>ВХОД ДЛЯ СПЕЦИАЛИСТОВ ЗДРАВООХРАНЕНИЯ</h3>
         
         <p>Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения- медицинских 
         и фармацевтических работников.</p>

         <p>Если Вы не являетесь специалистом здравоохранения, в соответствии 
         с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.</p>

         <p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВХОД», чтобы начать работу.</p>
         <a <?=(!$doctors? 'href="/doctors/"':'href="#" data-dismiss="modal" aria-hidden="true"')?> class="enter">Вход</a>
         <div class="checkbox"></div>
         <a <?=($doctors? 'href="/"':'href="#"')?> data-dismiss="modal" aria-hidden="true" class="back"> <span>&lsaquo;</span> ВЕРНУТЬСЯ</a>
         <span class="agree">подтверждаю</span>
       </div>    
     </div>
   </div>
 
 <div id="overlay"></div>
 
 <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  <?if($APPLICATION->GetCurDir()=='/'):?>
  <!--
  Start of DoubleClick Floodlight Tag: Please do not remove
  Activity name of this tag: http://ochenprosto.ru/ (HomePage)
  URL of the webpage where the tag is expected to be placed: https://www.lilly.ru/public/home.aspx
  This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
  Creation Date: 04/25/2013
  -->
  <script type="text/javascript">
  var axel = Math.random() + "";
  var a = axel * 10000000000000;
  document.write('<iframe src="https://4085203.fls.doubleclick.net/activityi;src=4085203;type=invmedia;cat=b9tmdo4q;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
  </script>
  <noscript>
  <iframe src="https://4085203.fls.doubleclick.net/activityi;src=4085203;type=invmedia;cat=b9tmdo4q;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
  </noscript>

  <!-- End of DoubleClick Floodlight Tag: Please do not remove -->
<? endif;?>
  
 <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
  (function (d, w, c) {
      (w[c] = w[c] || []).push(function() {
          try {
              w.yaCounter21460912 = new Ya.Metrika({id:21460912,
                      webvisor:true,
                      clickmap:true,
                      trackLinks:true,
                      accurateTrackBounce:true});
          } catch(e) { }
      });

      var n = d.getElementsByTagName("script")[0],
          s = d.createElement("script"),
          f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

      if (w.opera == "[object Opera]") {
          d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }
  })(document, window, "yandex_metrika_callbacks");
  </script>
  <noscript><div><img src="//mc.yandex.ru/watch/21460912" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
</body>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=Bh6DI5ReSHIvsQsemv1SLKV6jKW8*qviv*I2ezvg/tqn4jZ439vgbfkzR2dG26Go/i4c*k6YC/B9MYPQWEEndGWVz/h81y8wBJjErUivrgccc5*4bzV4R7pAEENut9J/C8TyNd1rlJDD78OlhjcsIrNKOogMjYcoqSHHRNmNgbo-';</script>
<? 

$APPLICATION->SetAdditionalCSS("/layout/css/bootstrap.min.css", true);
$APPLICATION->SetAdditionalCSS("/layout/css/plugins.css", true);
$APPLICATION->SetAdditionalCSS("/layout/css/style.css", true);

$APPLICATION->AddHeadScript('/layout/js/jquery.js');
$APPLICATION->AddHeadScript('/layout/js/plugins.min.js');
if($APPLICATION->GetCurDir()=='/')
  $APPLICATION->AddHeadScript('/layout/js/vimeo.js');
$APPLICATION->AddHeadScript('/layout/js/main.js');
?>
<?php $APPLICATION->ShowHead();?>
<?if($_COOKIE['checkbox']!=='true'&&$doctors){?>
          <script>
            $(function(){
              $('#doctor').modal({
                backdrop: 'static'
              });  
            })
          </script>
    <?}?>
