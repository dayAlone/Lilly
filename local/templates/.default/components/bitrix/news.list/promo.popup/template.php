<?
$this->setFrameMode(true);
?>
<div id="promo" class="woman">
<?
   
   $i=0;
   $open = 0;
   $items = array_chunk($arResult['ITEMS'],3);
   foreach ($items as $item) {
     ?>
      
      <div class="row">
         <div class="col-md-7">
            <?if($item[0]) item_promo($item[0],'big', $a=0, 'woman');?>
         </div>
         
         <div class="col-md-5">
            <?if($item[1]) item_promo($item[1],'medium', $a=0, 'woman');?>
            <?if($item[2]) item_promo($item[2],'medium', $a=0, 'woman');?>
         </div>
      </div>   
   
      <?
      $i++;
   }
?>
</div>


   