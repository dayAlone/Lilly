<?
$this->setFrameMode(true);
?>
<?
  global $doctors;
  $path = str_replace('index.php', '', $_SERVER['REAL_FILE_PATH']);
?> 
	<div id="article" class="<?=($arResult['PROPERTIES']['VIDEO']['VALUE']?"video":"")?>">
     <div class="top-title" style="background-image: url(<?=(file_exists($_SERVER['DOCUMENT_ROOT'].$arResult['DETAIL_PICTURE']['SRC'])?$arResult['DETAIL_PICTURE']['SRC']:"http://ochenprosto.ru".$arResult['DETAIL_PICTURE']['SRC'])?>)">
       <div class="shadow-1"></div>
       <div class="shadow-2"></div>
       <div class="image" style="background-image: url(<?=(file_exists($_SERVER['DOCUMENT_ROOT'].$arResult['DETAIL_PICTURE']['SRC'])?$arResult['DETAIL_PICTURE']['SRC']:"http://ochenprosto.ru".$arResult['DETAIL_PICTURE']['SRC'])?>)">
        <div class="shadow-1"></div>
       </div>
       <? if($arResult['PREV']): ?>
	       <a href="<?=$path?><?=$arResult['PREV']['CODE']?>/" class="arrow left" onmouseover="_gaq.push(['_trackEvent', 'Article', 'PrevArticle', 'Previous Article']);">
	         <div class="icon"></div>
	         <div class="text"><?=str_replace('®','<sup>®</sup>', $arResult['PREV']['NAME'])?></div>
	       </a>
	   <? endif;?>
	   <? if($arResult['NEXT']): ?>
	       <a href="<?=$path?><?=$arResult['NEXT']['CODE']?>/" class="arrow right" onmouseover="_gaq.push(['_trackEvent', 'Article', 'NextArticle', 'Next Article']);">
	         <div class="icon"></div>
	         <div class="text"><?=str_replace('®','<sup>®</sup>', $arResult['NEXT']['NAME'])?></div>
	       </a>
	   <? endif;?>

       <div class="container">
        <?if($arResult['PROPERTIES']['VIDEO']['VALUE']):?>
          <div class="icon-play"></div>
          <div class="video-block">
            <?=$arResult['PROPERTIES']['VIDEO']['~VALUE']?>
          </div>
        <? endif; ?>
        <div class="text">
         <h1><?=str_replace('®','<sup>®</sup>', $arResult['NAME'])?></h1>
         <?=($arResult['PREVIEW_TEXT']?'<h3>'.$arResult['PREVIEW_TEXT'].'</h3>':'')?>
        </div>  
       </div>
       
     </div>
     
     <div class="content">
       <div class="container">
         <div id="chapter-list">
           <?
            if($doctors):
              
              $APPLICATION->IncludeComponent("bitrix:news.list", "more", 
              array(
                 "IBLOCK_ID"           => 4,
                 "NEWS_COUNT"          => 999999,
                 "SORT_BY1"            => "SORT",
                 "SORT_ORDER1"         => "ASC",
                 "CURRENT"             => $arResult['ID'],
                 "FIELD_CODE"          => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
                 "PROPERTY_CODE"       => array("AUTHOR","HTML_TITLE"),
                 "DETAIL_URL"          => "/materials/#ELEMENT_CODE#/",
                 "CACHE_TYPE"          => "A",
                 "DISPLAY_PANEL"       => "N",
                 "PARENT_SECTION"      => $arResult['CATEGORIES'][count($arResult['CATEGORIES'])-1],
                 "SET_TITLE"           => "N"
                 ),
                 false
              );
              ?>
              <?
            else:
              global $arFilter;

              if($arResult['PROPERTIES']['PARENT']['VALUE']>0)
              {
                $arFilter = array('ID'=>$arResult['PROPERTIES']['PARENT']['VALUE']);
                $APPLICATION->IncludeComponent("bitrix:news.list", "more", 
                array(
                   "IBLOCK_ID"           => 1,
                   "NEWS_COUNT"          => 1,
                   "SORT_BY1"            => "SORT",
                   "SORT_ORDER1"         => "ASC",
                   "FILTER_NAME"         => "arFilter",
                   "FIELD_CODE"          => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
                   "PROPERTY_CODE"       => array("AUTHOR","HTML_TITLE", "PARENT"),
                   "DETAIL_URL"          => "/materials/#ELEMENT_CODE#/",
                   "CACHE_TYPE"          => "A",
                   "DISPLAY_PANEL"       => "N",
                   "SET_TITLE"           => "N"
                   ),
                   false
                );
              }
              $arFilter = array('!ID'=>$arResult['ID'], "PROPERTY_PARENT"=>($arResult['PROPERTIES']['PARENT']['VALUE']?$arResult['PROPERTIES']['PARENT']['VALUE']:$arResult['ID']));
              $APPLICATION->IncludeComponent("bitrix:news.list", "more", 
              array(
                 "IBLOCK_ID"           => 5,
                 "NEWS_COUNT"          => 5,
                 "SORT_BY1"            => "SORT",
                 "SORT_ORDER1"         => "ASC",
                 "SORT_BY2"            => "ID",
                 "SORT_ORDER2"         => "ASC",
                 "FILTER_NAME"         => "arFilter",
                 "FIELD_CODE"          => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
                 "PROPERTY_CODE"       => array("AUTHOR","HTML_TITLE", "PARENT"),
                 "DETAIL_URL"          => "/materials/#ELEMENT_CODE#/",
                 "CACHE_TYPE"          => "A",
                 "DISPLAY_PANEL"       => "N",
                 "SET_TITLE"           => "N"
                 ),
                 false
              );
            endif;
            ?>
         </div>
         <div class="row">
           <div class="col-md-<?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'12':'8')?>">
             <?=$arResult['~DETAIL_TEXT']?>
           </div>
          <? if(!$doctors&&$arResult['IBLOCK_ID']!=5) :
          ?>
           <div class="col-md-8 <?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'hidden':'')?> side" >
            
              <h4>Другие публикации</h4>
              <?php
                  global $arFilter;
                  $arFilter = array('!ID'=>$arResult['ID']);
                  $APPLICATION->IncludeComponent("bitrix:news.list", "promo3", 
                  array(
                     "IBLOCK_ID"           => 1,
                     "NEWS_COUNT"          => "3",
                     "SORT_BY1"            => "RAND",
                     "SORT_ORDER1"         => "ASC",
                     "FILTER_NAME"         => "arFilter",
                     "FIELD_CODE"          => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
                     "PROPERTY_CODE"       => array("AUTHOR","HTML_TITLE"),
                     "DETAIL_URL"          => "/news/#SECTION_ID#/#ELEMENT_ID#/",
                     "CACHE_TYPE"          => "A",
                     "DISPLAY_PANEL"       => "N",
                     "PARENT_SECTION"      => ($arResult['IBLOCK_ID']==1?$arResult['CATEGORIES'][count($arResult['CATEGORIES'])-1]:""),
                     "PARENT_SECTION_CODE" => "man",
                     "SET_TITLE"           => "N"
                     ),
                     false
                  );
              ?>
              
           </div>
          <? endif;?>
         </div>
       </div>
     </div>
     
   <? if ($arResult["IBLOCK_ID"]==4 && strlen($next['CODE'])>0): 
        ?>
        <a href="<?=$path?><?=$next['CODE']?>/" id="more-link">Следующая запись
         <svg width="10px" height="18px" viewBox="0 0 10 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
           <g id="Portrait" sketch:type="MSArtboardGroup" transform="translate(-318.000000, -451.000000)" fill="#020202">
               <path d="M324.968048,460.268375 L324.967471,458.945116 L318.318025,466.487624 L319.818264,467.810229 L326.46771,460.26772 L327.051224,459.605836 L326.467133,458.944462 L319.749542,451.338044 L318.250458,452.661956 L324.968048,460.268375 Z" id="Imported-Layers" sketch:type="MSShapeGroup"></path>
           </g>
          </g>
         </svg>
       </a>
   <? 
      else: ?>
     <a href="../" id="more-link">Больше материалов
       <svg width="10px" height="18px" viewBox="0 0 10 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
         <g id="Portrait" sketch:type="MSArtboardGroup" transform="translate(-318.000000, -451.000000)" fill="#020202">
             <path d="M324.968048,460.268375 L324.967471,458.945116 L318.318025,466.487624 L319.818264,467.810229 L326.46771,460.26772 L327.051224,459.605836 L326.467133,458.944462 L319.749542,451.338044 L318.250458,452.661956 L324.968048,460.268375 Z" id="Imported-Layers" sketch:type="MSShapeGroup"></path>
         </g>
        </g>
       </svg>
     </a>
   <?endif;?>
  </div>