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

    <link href="/layout/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/layout/css/plugins.css" rel="stylesheet" />
    <link href="/layout/css/style.css" rel="stylesheet" />
    
    <!--[if IE]>
           <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/layout/js/jquery.js"></script>
    <script type="text/javascript" src="/layout/js/plugins.js"></script>
    <script type="text/javascript" src="/layout/js/main.js"></script>
  </head>

  <body>
   <div class="frame">
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
                       <a href="/doctors/" class="<?= (strstr($_SERVER['SCRIPT_NAME'],'doctors')?'active':'') ?>">Специалистам</a><br>
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
                       <a href="#">Найти уролога</a>
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
                       <a href="#" class="">Доктор-Локатор</a><br>
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
     <?endif;?>
   