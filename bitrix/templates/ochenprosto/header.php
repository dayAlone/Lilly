<?
  global $nav;
  global $doctors;
  global $index;
  if(isset($_REQUEST['v'])){
      $_SESSION['v'] = $_REQUEST['v'];
  }
  if(strstr($_SERVER['REQUEST_URI'],'doctors'))
    $doctors = true;
  
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php $APPLICATION->ShowTitle();?></title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
     
    <?php $APPLICATION->ShowHead();?>    
    
    
    <? if($APPLICATION->GetCurPage()=='/' && $_SERVER['SERVER_NAME']=='ochenprosto.ru') {?>
<?/*    
    <!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='59248007-11',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->
*/?>


    <? }?>
    
    <? if(!$APPLICATION->GetDirProperty("hide_metric")):?>
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-31297918-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <? endif;?>
  </head>

  <body>
  
   <div class="frame <?=(!$doctors?'user':'doctor')?> <?=($index?'index':'')?>" style="opacity: 0">
     <div id="panel"><?$APPLICATION->ShowPanel();?></div>
     <? global $toolbar ?>
     <div id="toolbar" class="<?=($nav?$nav:'')?>">
        <div class="container">
           <div class="row">
              <div class="col-md-2">
                 <a href="<?=($_SERVER['SERVER_NAME']=='ochenprosto.ru'||$_SERVER['SERVER_NAME']=='l.local'?'/':'http://ochenprosto.ru/')?><?=(isset($_SESSION['v'])?"?v=".$_SESSION['v']:"")?>" id="logo">
                    <img src="/layout/images/logo.png" alt="">
                 </a>
                 <div class="mobile_title">
                   <?=$APPLICATION->AddBufferContent("mobile_title");?>
                 </div>
                 <a href="#" class="trigger"></a>
                 <a class="enter" data-toggle="modal" data-target="#doctor" href="#doctor">Войти</a>
              </div>
              <? if(!$APPLICATION->GetDirProperty("hide_nav")):?>
              <div class="col-md-10">
                 <ul class="nav">
                    <li class="hidden">
                      <a class="trigger" href="#">
                        <svg width="10px" height="18px" viewBox="0 0 10 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                           <g id="Portrait" sketch:type="MSArtboardGroup" transform="translate(-318.000000, -451.000000)" fill="#020202">
                               <path d="M324.968048,460.268375 L324.967471,458.945116 L318.318025,466.487624 L319.818264,467.810229 L326.46771,460.26772 L327.051224,459.605836 L326.467133,458.944462 L319.749542,451.338044 L318.250458,452.661956 L324.968048,460.268375 Z" id="Imported-Layers" sketch:type="MSShapeGroup"></path>
                           </g>
                          </g>
                         </svg>
                      </a>
                    </li>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                    	"ROOT_MENU_TYPE" => "top",
                    	"MENU_CACHE_TYPE" => "A",
                    	"MENU_CACHE_TIME" => "3600",
                    	"MENU_CACHE_USE_GROUPS" => "Y",
                    	"MENU_CACHE_GET_VARS" => array(
                    		0 => "",
                    		1 => "",
                    	),
                    	"MAX_LEVEL" => "2",
                    	"CHILD_MENU_TYPE" => "left",
                    	"USE_EXT" => "Y",
                    	"DELAY" => "Y",
                    	"ALLOW_MULTI_SELECT" => "Y"
                    	),
                    	false
                    );?>
                 </ul>
              </div>
              <? endif;?>
           </div>
        </div>
     </div>
     <?if(!$doctors&&!defined('ERROR_404')):?>
       <? /*<a href="/upload/takethis.ochenprosto.ru.pdf" class="flag no-ajax get" target="_blank"><img src="/layout/images/flag-get.png"></a>*/?>
       <a href="/test/man/" class="flag test"><img src="/layout/images/flag-test.png"></a>
      <? if(!$APPLICATION->GetDirProperty("hide_enter") && $APPLICATION->GetCurDir()!='/'):?>
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
          <?
            // Index
            if($APPLICATION->GetCurPage()=='/') {
              $over         = "_gaq.push(['_trackEvent', 'EntryRibbon', 'RollOver', 'RO Main Page Ribbon']);";
              $click_button = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Click', 'Click Main Page Ribbon']);";
              $click_check  = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Check', 'Check Main Page Ribbon']);";
            }
            // Woman
            if(strstr($APPLICATION->GetCurPage(),'woman')) {
              $over         = "_gaq.push(['_trackEvent', 'EntryRibbon', 'RollOver', 'RO Women Ribbon']);";
              $click_button = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Click', 'Click Women Ribbon']);";
              $click_check  = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Check', 'Check Women Ribbon']);";
            }
            if(strstr($APPLICATION->GetCurPage(),'materials')) {
              // Articles
              $over         = "_gaq.push(['_trackEvent', 'EntryRibbon', 'RollOver', 'RO Article Ribbon']);";
              $click_button = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Click', 'Click Article Ribbon']);";
              $click_check  = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Check', 'Check Article Ribbon']);";
            }
            if($APPLICATION->GetCurPage()=='/faq/') {
              // FAQ
              $over         = "_gaq.push(['_trackEvent', 'EntryRibbon', 'RollOver', 'RO FAQ Ribbon']);";
              $click_button = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Click', 'Click FAQ Ribbon']);";
              $click_check  = "_gaq.push(['_trackEvent', 'EntryRibbon', 'Check', 'Check FAQ Ribbon']);";
            }

          ?>
          <a href="/doctors" class="no-ajax" onmouseover="<?=$over?>" onclick="<?=$click_button?>">Войти</a>
          <div class="checkbox" onclick="<?=$click_check?>"></div>
          <p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВХОД», чтобы начать работу.</p>
        </div>
      </div>
      <?endif;?>
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