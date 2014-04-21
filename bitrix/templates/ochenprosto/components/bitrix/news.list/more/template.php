<?
   global $doctors;
   function item($item, $size) {
      echo '<a href="'.($doctors?"/doctors/video/":'/materials/').$item['CODE'].'/" class="block '.$size.'" style="background-image:url('.$item['PREVIEW_PICTURE']['SRC'].')">
                  <div class="shadow"></div>
                  <div class="content">
                     '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                     ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                     <div class="title">'.$item['NAME'].'</div>').'
                  </div>
               </a>';
   }
   foreach ($arResult['ITEMS'] as $item) {
      item($item,'small');  
   }
?>