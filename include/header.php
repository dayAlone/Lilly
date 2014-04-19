<?
  global $doctors;
  global $enter;
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Lilly Answers That Matter</title>
    
    <meta name="viewport" content="width=850, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">

  </head>

  <body>
   <div class="frame" style="opacity: 0">
     <? global $toolbar ?>
     <div id="toolbar" class="<?=($toolbar?$toolbar:'')?>">
        <div class="container">
           <div class="row">
              <div class="col-md-2">
                 <a href="/" id="logo">
                    <img src="/layout/images/logo.png" alt="">
                 </a>
              </div>
              <div class="col-md-10">
                 <ul class="nav">
                    <?if(!$doctors):?>
                    <li>
                       <a href="#doctor" data-toggle="modal" data-target="#doctor" class="<?= (strstr($_SERVER['SCRIPT_NAME'],'doctors')?'active':'') ?>">Специалистам</a><br>
                    </li>
                    <li>
                       <a href="/materials.html" class="<?= ($_SERVER['SCRIPT_NAME']=='/materials.html'?'active':'') ?>">Мужской разговор</a><br>
                       <span class="small">об эректильной дисфункции</span><br>
                       <span class="small">об аденоме проедстательной железы</span>
                    </li>
                    <li>
                       <a href="/faq.html" class="<?= ($_SERVER['SCRIPT_NAME']=='/faq.html'?'active':'') ?>">FAQ</a><br>
                       <span class="small">ответы<br/>на ваши вопросы</span>
                    </li>
                    <li>
                       <a href="/woman.html" class="<?= ($_SERVER['SCRIPT_NAME']=='/woman.html'?'active':'') ?>">Для женщин</a><br>
                       <span class="small">как помочь, <br>если у него ЭД?</span>
                    </li>
                    <li>
                       <a href="#locator"  data-toggle="modal" data-target="#locator" class="">Найти уролога</a>
                    </li>
                  <? else :?>
                    <li>
                       <a href="/doctors/" class="<?= ($_SERVER['SCRIPT_NAME']=='/doctors/index.html'?'active':'') ?><?= ($_SERVER['SCRIPT_NAME']=='/doctors/product-1.html'?'active':'') ?><?= ($_SERVER['SCRIPT_NAME']=='/doctors/product-2.html'?'active':'') ?>">О препаратах</a><br>
                    </li>
                    <li>
                       <a href="/doctors/video.html" class="<?= ($_SERVER['SCRIPT_NAME']=='/doctors/video.html'?'active':'') ?>">Записи научных трансляций</a><br>
                    </li>
                    <li>
                       <a href="/doctors/research.html" class="<?= ($_SERVER['SCRIPT_NAME']=='/doctors/research.html'?'active':'') ?>">Клинические исследования</a><br>
                    </li>
                    <li>
                       <a href="#locator"  data-toggle="modal" data-target="#locator" class="">Доктор-Локатор</a><br>
                    </li>
                  <? endif; ?>
                 </ul>
              </div>
           </div>
        </div>
     </div>
     <?if(!$doctors):?>
       <a href="#" class="flag get"><img src="/layout/images/flag-get.png"></a>
       <a href="#" class="flag test"><img src="/layout/images/flag-test.png"></a>
     
      <div id="enter" class="short">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-xs-6">
              <div class="title">вход для специалистов здравоохранения</div>
              <p>Вход для специалистов здравоохранения. Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения – медицинских и фармацевтических работников. Если Вы не являетесь специалистом здравоохранения, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.</p>
            </div>
          </div>
        </div>
        <div class="block">
          <a href="/doctors" class="no-ajax">Войти</a>
          <div class="checkbox"></div>
          <p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВХОД», чтобы начать работу.</p>
        </div>
      </div>
     <? else:?>
     <?/*
      <div id="event">
         <div class="day">25</div>
         <div class="month">апреля</div>
         <div class="wday">понедельник</div>
         <div class="title">IV МЕЖДУНАРОДНЫЙ СИМПОЗИУМ ПО СЕКСУАЛЬНОЙ И РЕПРОДУКТИВНОЙ МЕДИЦИНЕ</div>
         <a href="#">ВСЕ СОБЫТИЯ</a>
      </div>
      */?>
     <?endif;?>
   