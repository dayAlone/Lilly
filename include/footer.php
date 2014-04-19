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
                  <a href="#">О компании</a>
                  <a href="#">Конфиденциальность информации</a>
                  <a href="#">Пользовательское соглашение</a><br>
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
</body>