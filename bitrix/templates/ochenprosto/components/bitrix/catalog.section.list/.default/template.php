<?
$this->setFrameMode(true);
?>
<div id="video-list">
      <div class="container"><?
	$i=0;
	foreach ($arResult['SECTIONS'] as $item) {
		if($i%3==0)	{
			if($i!=0) echo "</div>";
			echo '<div class="row">';
		}
		$arSelect = Array("ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>$item['IBLOCK_ID'], "SECTION_ID"=>$item['ID']);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);
		$ob = $res->Fetch();
		?>
			<div class="col-md-4">
               <a href="<?=($item["UF_WEBINAR"]?"http://webinar.".$_SERVER['SERVER_NAME']:"")?>/doctors/video/<?=$ob['CODE']?>/" class="item">
               	  <div class="header">
	                  <span class="title <?=strlen($item['NAME'])?> <?=(strlen($item['NAME'])>51?"medium":"")?> <?=(strlen($item['NAME'])>75?"small":"")?>">
	                     <?=str_replace('®','<sup>®</sup>', $item['NAME'])?>
	                  </span>
	                  <div class="date"><?=$item["UF_DATE"]?></div>
                  </div>
                  <span class="image" style="background-image:url(http://ochenprosto.ru<?=CFile::GetPath($item['PICTURE'])?>)">
					<? if($item["UF_SOON"]) { ?>
						<span class="soon">Скоро</span>	
					<? } ?>
					<? if($item["UF_PARTS"]) { ?>
						<span class="parts <?=(strlen($item['UF_PARTS'])>9?"small":"")?>"><?=$item["UF_PARTS"]?></span>	
					<? } ?>
					<? if($item["UF_TIME"]) { ?>
						<span class="minutes"><?=$item["UF_TIME"]?></span>	
					<? } ?>
                  </span>
                  <span class="description">
                     <?=$item['DESCRIPTION']?>
                  </span>
               </a>
            </div>
		<?
		$i++;
	}
?>
</div>

		
      </div>
   </div>