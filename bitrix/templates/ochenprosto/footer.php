<?
   global $doctors;
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
               <a href="#" class="logo">
                  <img src="/layout/images/logo2.png" alt="">
               </a>
            </div>
            <div class="col-md-11 right">
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
            <? /*
            <div class="col-md-4">
               <div class="counter">
                  <nobr>
                     <span class="n">7</span>
                     <span class="n">1</span>
                     <span class="n">5</span>
                     <span class="n">9</span>
                     <span class="n">7</span>
                     <span class="n">7</span>
                     <span class="n">7</span>
                     <span class="t">человек <br>посетили этот сайт</span>
                  </nobr>
               </div>
               <div class="search">
                  <input type="submit" value="">
                  <input type="text" placeholder="Поиск по сайту">

               </div>
            </div>
            */?>
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

         <a href="http://doctorlocator.rusmh.org" target="_blank" class="no-ajax go">перейти</a>

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
         <a href="/doctors/" class="no-ajax enter">Вход</a>
         <div class="checkbox"></div>
         <a href="#" data-dismiss="modal" aria-hidden="true" class="back"> <span>&lsaquo;</span> ВЕРНУТЬСЯ</a>
         <span class="agree">подтверждаю</span>
       </div>    
     </div>
   </div>
 
 <link href="/layout/css/bootstrap.min.css" rel="stylesheet" />
 <link href="/layout/css/plugins.css" rel="stylesheet" />
 <link href="/layout/css/style.css" rel="stylesheet" />
 
 <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
 <script type="text/javascript" src="/layout/js/jquery.js"></script>
 <script type="text/javascript" src="/layout/js/plugins.js"></script>
 <script type="text/javascript" src="/layout/js/main.js"></script>
 <?if($_COOKIE['checkbox']!=='true'&&$doctors){?>
      <script>
        $('#doctor').modal();
      </script>
<?}?>
</body>