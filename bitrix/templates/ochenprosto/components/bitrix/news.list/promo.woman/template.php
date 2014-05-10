<div id="promo" class="woman">
<?
   function item_w($item, $size) {
      echo '<a href="/woman/'.$item['CODE'].'/" class="block '.$size.'" style="background-image:url('.$item['PREVIEW_PICTURE']['SRC'].')">
                  <div class="shadow"></div>
                  <div class="content">
                     '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                     ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                     <div class="title">'.str_replace('®','<sup>®</sup>', $item['NAME']).'</div>
                     '.($item['~PREVIEW_TEXT']?'<div class="text">'.$item['~PREVIEW_TEXT'].'</div>':'')).'
                  </div>
               </a>';
   }
   $i=0;
   $open = 0;
   $items = array_chunk($arResult['ITEMS'],3);
   foreach ($items as $item) {
     ?>
      
      <div class="row">
         <div class="col-md-7">
            <?if($item[0]) item_w($item[0],'big');?>
         </div>
         
         <div class="col-md-5">
            <?if($item[1]) item_w($item[1],'medium');?>
            <?if($item[2]) item_w($item[2],'medium');?>
         </div>
      </div>   
   
      <?
      $i++;
   }
?>
</div>


   