<div class="row">
<div class="col-md-6">
<?
   $count = count($arResult['ITEMS']);
   $i = 1;
   $divider = false;
   foreach ($arResult['ITEMS'] as $item) {
      if($i>($count/2)&&!$divider) {
         echo "</div><div class=\"col-md-6\">";
         $divider = true;
      }
      ?>
         <div class="item no-ajax" target="_blank">
            <div class="image" style="background-image:url(<?=(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC'])?>)">
               <div class="icon"></div>
            </div>
            <div class="content">
               <div class="title"><?=$item['NAME']?></div>
               <div class="description"><?=$item['PROPERTIES']['DESCRIPTION']['VALUE']?></div>
            </div>
            <div class="corner"></div>
            <div class="buttons">
            	<a href="<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>" target="_blank" data-toggle="tooltip" class="no-ajax" data-placement="top" title="Просмотреть"></a>
            	<a target="_blank" href="/download.php?f=<?=$item['PROPERTIES']['FILE']['VALUE']?>" data-toggle="tooltip" class="no-ajax" data-placement="top" title="Скачать"></a>
            </div>
         </div>
      <?
      $i++;
   }
?>
</div>
</div>