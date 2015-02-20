<?
$this->setFrameMode(true);
?>
<div id="promo">
<?
   $i=0;
   $open = 0;
   $count = 0;
   $items = array_chunk($arResult['ITEMS'],5);
   foreach ($items as $key => $item) {
     ?>
      <div class="row">
         <div class="col-md-6">
            <?item_promo($item[0],'small', $count);?>                  
         </div>
         <div class="col-md-6">
            <?item_promo($item[1],'small', $count);?>
         </div>
      </div>
         
      <div class="row">  
         <div class="col-md-12">
               <?item_promo($item[2],'big', $count);?>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <?item_promo($item[3],'small', $count);?>                  
         </div>
         <div class="col-md-6">
            <?item_promo($item[4],'small', $count);?>
         </div>
      </div>
      <?
      $i++;
   }
   if($APPLICATION->GetCurDir()=='/'):
?>
   <a href="/materials/" id="more-link">Больше материалов
      
   <svg width="10px" height="18px" viewBox="0 0 10 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
     <g id="Portrait" sketch:type="MSArtboardGroup" transform="translate(-318.000000, -451.000000)" fill="#020202">
         <path d="M324.968048,460.268375 L324.967471,458.945116 L318.318025,466.487624 L319.818264,467.810229 L326.46771,460.26772 L327.051224,459.605836 L326.467133,458.944462 L319.749542,451.338044 L318.250458,452.661956 L324.968048,460.268375 Z" id="Imported-Layers" sketch:type="MSShapeGroup"></path>
     </g>
    </g>
   </svg>
   </a>
<?
   endif;
?>
</div>