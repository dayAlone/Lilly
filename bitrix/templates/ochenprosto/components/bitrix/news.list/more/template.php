<?
$this->setFrameMode(true);
?>
<?
   global $doctors;
   if(!function_exists('item_more')) {
      function item_more($item, $size) {
         echo '<a onclick="_gaq.push([\'_trackEvent\', \'Article\', \'ReadOnClick\', \'Publications Click\']);" href="'.(strstr($_SERVER['REQUEST_URI'],'doctors')?"/doctors/video/":'/materials/').$item['CODE'].'/" class="block '.$size.'" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')">
                     <div class="shadow"></div>
                     <div class="image" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')"><div class="shadow"></div></div>
                     <div class="content">
                        '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                        ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                        <div class="title">'.str_replace('®','<sup>®</sup>', $item['NAME']).'</div>').'
                     </div>
                  </a>';
      }
   }
   foreach ($arResult['ITEMS'] as $item) {
      item_more($item,'small');  
   }
?>