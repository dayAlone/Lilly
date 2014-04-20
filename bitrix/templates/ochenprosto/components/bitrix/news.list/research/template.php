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
         <a class="item no-ajax" target="_blank" href="<?=$item['PROPERTIES']['FILE']['VALUE']?>">
            <div class="image" style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)">
               <div class="icon"></div>
            </div>
            <div class="content">
               <div class="title"><?=$item['NAME']?></div>
               <div class="description"><?=$item['PROPERTIES']['DESCRIPTION']['VALUE']?></div>
            </div>
            <div class="corner"></div>
            <div class="buttons"></div>
         </a>
      <?
      $i++;
   }
?>
</div>
</div>