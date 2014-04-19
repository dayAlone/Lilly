<?
  global $nav;
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php $APPLICATION->ShowTitle();?></title>
    
    <meta name="viewport" content="width=850, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <?php $APPLICATION->ShowHead();?>
  </head>

  <body>
   <div class="frame" style="opacity: 0">
     <div id="panel"><?$APPLICATION->ShowPanel();?></div>
     <? global $toolbar ?>
     <div id="toolbar" class="<?=($nav?$nav:'')?>">
        <div class="container">
           <div class="row">
              <div class="col-md-2">
                 <a href="/" id="logo">
                    <img src="/layout/images/logo.png" alt="">
                 </a>
              </div>
              <div class="col-md-10">
                 <ul class="nav">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                    	"ROOT_MENU_TYPE" => "top",
                    	"MENU_CACHE_TYPE" => "A",
                    	"MENU_CACHE_TIME" => "3600",
                    	"MENU_CACHE_USE_GROUPS" => "Y",
                    	"MENU_CACHE_GET_VARS" => array(
                    		0 => "",
                    		1 => "",
                    	),
                    	"MAX_LEVEL" => "1",
                    	"CHILD_MENU_TYPE" => "top",
                    	"USE_EXT" => "Y",
                    	"DELAY" => "Y",
                    	"ALLOW_MULTI_SELECT" => "Y"
                    	),
                    	false
                    );?>
                 </ul>
              </div>
           </div>
        </div>
     </div>
     <?if(!$doctors):?>
       <a href="/upload/takethis.ochenprosto.ru.pdf" class="flag get" target="_blank"><img src="/layout/images/flag-get.png"></a>
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
   