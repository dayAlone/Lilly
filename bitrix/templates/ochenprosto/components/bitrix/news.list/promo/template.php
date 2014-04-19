<div id="promo">
<?
   function item($item, $size) {
      echo '<a href="/materials/'.$item['CODE'].'/" class="block '.$size.'" style="background-image:url('.$item['PREVIEW_PICTURE']['SRC'].')">
                  <div class="shadow"></div>
                  <div class="content">
                     '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                     ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                     <div class="title">'.$item['NAME'].'</div>
                     '.($item['~PREVIEW_TEXT']?'<div class="text">'.$item['~PREVIEW_TEXT'].'</div>':'')).'
                  </div>
               </a>';
   }
   $i=0;
   $open = 0;
   $items = array_chunk($arResult['ITEMS'],5);
   foreach ($items as $item) {
     ?>
      <div class="row">
         <div class="col-md-7">
            <?if($item[0]) item($item[0],'big');?>

            <div class="row">
               <div class="col-md-6">
                  <?if($item[1]) item($item[1],'small');?>                  
               </div>
               <div class="col-md-6">
                  <?if($item[2]) item($item[2],'small');?>
               </div>
            </div>
         </div>
         
         <div class="col-md-5">
            <?if($item[3]) item($item[3],'medium');?>
            <?if($item[4]) item($item[4],'medium');?>
         </div>
      </div>
         
      <?
      $i++;
   }
?>
</div>