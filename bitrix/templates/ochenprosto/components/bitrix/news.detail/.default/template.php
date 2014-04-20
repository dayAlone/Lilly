<?
  $db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], false);
  $categorys = array();
  while($ar_group = $db_old_groups->Fetch()) {
   $categorys[] = $ar_group["ID"];
  }
	$rs = CIBlockElement::GetList(
									array("sort" => "asc"), 
									array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID"=>$arResult['IBLOCK_SECTION_ID']), 
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
	<div id="article">
     <div class="top-title" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)">
       <div class="shadow-1"></div>
       <div class="shadow-2"></div>
       <? if($prev): ?>
	       <a href="<?=$path?><?=$prev['CODE']?>/" class="arrow left">
	         <div class="icon"></div>
	         <div class="text"><?=$prev['NAME']?></div>
	       </a>
	   <? endif;?>
	   <? if($next): ?>
	       <a href="<?=$path?><?=$next['CODE']?>/" class="arrow right">
	         <div class="icon"></div>
	         <div class="text"><?=$next['NAME']?></div>
	       </a>
	   <? endif;?>

       <div class="container">
        <div class="text">
         <h1><?=$arResult['NAME']?></h1>
         <?=($arResult['PREVIEW_TEXT']?'<h3>'.$arResult['PREVIEW_TEXT'].'</h3>':'')?>
        </div>  
       </div>
       
     </div>
     
     <div class="content">
       <div class="container">
         <div class="row">
           <div class="col-md-<?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'12':'8')?>">
             <?=$arResult['~DETAIL_TEXT']?>
           </div>
           <div class="col-md-4 <?=($arResult['PROPERTIES']['FULLWIDTH']['VALUE_XML_ID']=='Y'?'hidden':'')?> side" >
            <div class="fix">
              <h4>Другие публикации</h4>
               <?
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
                    "FILTER_NAME" => "",
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
           </div>
         </div>
       </div>
     </div>
     
   </div>