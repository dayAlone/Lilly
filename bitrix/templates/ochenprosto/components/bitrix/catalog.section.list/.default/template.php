<div id="video-list">
      <div class="container">
         
<?
	$i=0;
	foreach ($arResult['SECTIONS'] as $item) {
		if($i%3==0)	{
			if($i!=0) echo "</div>";
			echo '<div class="row">';
		}
		$arSelect = Array("ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>$item['IBLOCK_ID'], "SECTION_ID"=>$item['ID']);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);
		$ob = $res->GetFetch();
		?>
			<div class="col-md-4">
               <a href="/doctors/video/<?=$ob['CODE']?>/" class="item">
                  <span class="image" style="background-image:url(<?=$item['PICTURE']['SRC']?>)">
                     <span class="icon"></span>
                  </span>
                  <span class="title">
                     <?=$item['NAME']?>
                  </span>
                  <span class="description">
                     <?=$item['DESCRIPTION']?>
                  </span>
               </a>
            </div>
		<?
	}
?>
</div>

		
      </div>
   </div>