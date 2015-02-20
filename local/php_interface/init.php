<?	
	AddEventHandler("iblock", "OnAfterIBlockSectionAdd", "OnAfterIBlockSectionAddHandler");
	function OnAfterIBlockSectionAddHandler(&$arFields)
    {
        $SORT = $arFields["ID"]*100;
        $props = array("SORT" => $SORT);
        $bs = new CIBlockSection;
        $bs->Update($arFields["ID"], $props);
        $bs->Update(17, array("SORT" => $SORT-10));
    }

	function mobile_title() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('mobile_title')) {
			return $APPLICATION->GetPageProperty('mobile_title');
		}
	}
	function item_promo($item, $size, &$i = false, $blank, $url = "materials") {
      echo '<a href="'.(strlen($item['PROPERTIES']['LINK']['VALUE'])>0?$item['PROPERTIES']['LINK']['VALUE']:"/".$url."/".$item['CODE']."/").'" '.($blank?"target='_blank'":"").' class="block '.$size.' '.($i==0?"first":"").'" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')">
                  <div class="shadow"></div>
                  <div class="image" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')"><div class="shadow"></div></div>
                  '.($item['PROPERTIES']['VIDEO_ICON']['VALUE_XML_ID']=='Y'?"<img src='/layout/images/article-video-icon.png' class='video-icon'/>":"").'
                  <div class="content">
                     '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                     ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                     <div class="title">'.str_replace('®','<sup>®</sup>', $item['NAME']).'</div>
                     '.($item['~PREVIEW_TEXT']?'<div class="text">'.$item['~PREVIEW_TEXT'].'</div>':'')).'
                  </div>
               </a>';
      if(intval($i))
      	$i++;
   }
?>