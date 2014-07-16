<?
$this->setFrameMode(true);
?>
<?
  global $doctors;
  $db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], false);
  $categorys = array();
  while($ar_group = $db_old_groups->Fetch()) {
   $categorys[] = $ar_group["ID"];
  }
	$rs = CIBlockElement::GetList(
									array("sort" => "desc"), 
									array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID"=>$categorys[count($categorys)-1]), 
									false, 
									array("nElementID"=>$arResult["ID"], "nPageSize"=>1), 
									array("ID","CODE","NAME")
								); 
	while($ar=$rs->GetNext()) 
		$page[] = $ar;
	$next = false;
	$prev = false;
	if (count($page) == 2 && $arResult["ID"] == $page[0]['ID'])
		$prev = $page[1];
	else if (count($page) == 3) {
		$prev = $page[2];
		$next = $page[0];
	}
	else if (count($page) == 2 && $arResult["ID"] == $page[1]['ID'])
		$next = $page[0];

	$path = str_replace('index.php', '', $_SERVER['REAL_FILE_PATH']);
?> 
	<div id="article" class="<?=($arResult['PROPERTIES']['VIDEO']['VALUE']?"video":"")?>">
     <div class="top-title" style="background-image: url(<?=(file_exists($_SERVER['DOCUMENT_ROOT'].$arResult['DETAIL_PICTURE']['SRC'])?$arResult['DETAIL_PICTURE']['SRC']:"http://ochenprosto.ru".$arResult['DETAIL_PICTURE']['SRC'])?>)">
       <div class="shadow-1"></div>
       <div class="shadow-2"></div>
       <div class="image" style="background-image: url(<?=(file_exists($_SERVER['DOCUMENT_ROOT'].$arResult['DETAIL_PICTURE']['SRC'])?$arResult['DETAIL_PICTURE']['SRC']:"http://ochenprosto.ru".$arResult['DETAIL_PICTURE']['SRC'])?>)">
        <div class="shadow-1"></div>
       </div>
       <? if($prev): ?>
	       <a href="<?=$path?><?=$prev['CODE']?>/" class="arrow left" onmouseover="_gaq.push(['_trackEvent', 'Article', 'PrevArticle', 'Previous Article']);">
	         <div class="icon"></div>
	         <div class="text"><?=str_replace('®','<sup>®</sup>', $prev['NAME'])?></div>
	       </a>
	   <? endif;?>
	   <? if($next): ?>
	       <a href="<?=$path?><?=$next['CODE']?>/" class="arrow right" onmouseover="_gaq.push(['_trackEvent', 'Article', 'NextArticle', 'Next Article']);">
	         <div class="icon"></div>
	         <div class="text"><?=str_replace('®','<sup>®</sup>', $next['NAME'])?></div>
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
              global $arFilter;
              $arFilter = array('!ID'=>$arResult['ID']);
              $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "more",
                Array(
                  "IBLOCK_TYPE" => "content",
                  "IBLOCK_ID" => "4",
                  "NEWS_COUNT" => "5",
                  "SORT_BY1" => "SORT",
                  "SORT_ORDER1" => "ASC",
                  "SORT_BY2" => "",
                  "SORT_ORDER2" => "",
                  "FILTER_NAME" => "arFilter",
                  "FIELD_CODE" => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
                  "PROPERTY_CODE" => array("AUTHOR","HTML_TITLE"),
                  "CHECK_DATES" => "Y",
                  "DETAIL_URL" => "",
                  "AJAX_MODE" => "N",
                  "AJAX_OPTION_JUMP" => "N",
                  "AJAX_OPTION_STYLE" => "N",
                  "AJAX_OPTION_HISTORY" => "N",
                  "CACHE_TYPE" => "N",
                  "CACHE_TIME" => "36000000",
                  "CACHE_FILTER" => "N",
                  "CACHE_GROUPS" => "Y",
                  "PREVIEW_TRUNCATE_LEN" => "",
                  "ACTIVE_DATE_FORMAT" => "",
                  "SET_STATUS_404" => "N",
                  "SET_TITLE" => "N",
                  "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                  "ADD_SECTIONS_CHAIN" => "Y",
                  "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                  "PARENT_SECTION" => $categorys[count($categorys)-1],
                  "PARENT_SECTION_CODE" => "man",
                  "INCLUDE_SUBSECTIONS" => "N",
                  "DISPLAY_DATE" => "Y",
                  "DISPLAY_NAME" => "Y",
                  "DISPLAY_PICTURE" => "Y",
                  "DISPLAY_PREVIEW_TEXT" => "Y",
                  "PAGER_TEMPLATE" => "",
                  "DISPLAY_TOP_PAGER" => "N",
                  "DISPLAY_BOTTOM_PAGER" => "Y",
                  "PAGER_TITLE" => "Новости",
                  "PAGER_SHOW_ALWAYS" => "Y",
                  "PAGER_DESC_NUMBERING" => "N",
                  "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                  "PAGER_SHOW_ALL" => "Y"
                )
              );
              ?>
         </div>
         <div class="row">
           <div class="col-md-<?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'12':'8')?>">
             <?=$arResult['~DETAIL_TEXT']?>
           </div>
          <? if(!$doctors) :?>
           <div class="col-md-4 <?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'hidden':'')?> side" >
            <div class="fix">
              <h4>Другие публикации</h4>
               <?
                global $arFilter;
                $arFilter = array('!ID'=>$arResult['ID']);
                $APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "more",
                  Array(
                    "IBLOCK_TYPE" => "content",
                    "IBLOCK_ID" => "1",
                    "NEWS_COUNT" => "3",
                    "SORT_BY1" => "RAND",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "",
                    "SORT_ORDER2" => "",
                    "FILTER_NAME" => "arFilter",
                    "FIELD_CODE" => array("XML_ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
                    "PROPERTY_CODE" => array("AUTHOR","HTML_TITLE"),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => ($arResult['IBLOCK_ID']==1?$categorys[count($categorys)-1]:""),
                    "PARENT_SECTION_CODE" => "man",
                    "INCLUDE_SUBSECTIONS" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "PAGER_TEMPLATE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "Y",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "Y"
                  )
                );
                ?>
              </div>
           </div>
          <? endif;?>
         </div>
       </div>
     </div>
     
   
   <a href="../" id="more-link">Больше материалов
      
   <svg width="10px" height="18px" viewBox="0 0 10 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
     <g id="Portrait" sketch:type="MSArtboardGroup" transform="translate(-318.000000, -451.000000)" fill="#020202">
         <path d="M324.968048,460.268375 L324.967471,458.945116 L318.318025,466.487624 L319.818264,467.810229 L326.46771,460.26772 L327.051224,459.605836 L326.467133,458.944462 L319.749542,451.338044 L318.250458,452.661956 L324.968048,460.268375 Z" id="Imported-Layers" sketch:type="MSShapeGroup"></path>
     </g>
    </g>
   </svg>
   </a>
  </div>