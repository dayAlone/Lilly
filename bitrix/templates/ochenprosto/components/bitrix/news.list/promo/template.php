<div id="promo">
<?
   function item_promo($item, $size, &$i) {
      echo '<a href="/materials/'.$item['CODE'].'/" class="block '.$size.' '.($i==0?"first":"").'" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')">
                  <div class="shadow"></div>
                  <div class="image" style="background-image:url(http://ochenprosto.ru'.$item['PREVIEW_PICTURE']['SRC'].')"><div class="shadow"></div></div>
                  <div class="content">
                     '.($item['PROPERTIES']['HTML_TITLE']['VALUE']?'<div class="text">'.$item['PROPERTIES']['HTML_TITLE']['~VALUE'].'</div>':
                     ($item['PROPERTIES']['AUTHOR']['VALUE']?'<div class="name">'.$item['PROPERTIES']['AUTHOR']['VALUE'].'</div>':'').'
                     <div class="title">'.str_replace('®','<sup>®</sup>', $item['NAME']).'</div>
                     '.($item['~PREVIEW_TEXT']?'<div class="text">'.$item['~PREVIEW_TEXT'].'</div>':'')).'
                  </div>
               </a>';
      $i++;
   }
   $i=0;
   $open = 0;
   $count = 0;
   $items = array_chunk($arResult['ITEMS'],5);
   foreach ($items as $key => $item) {
     ?>
      <div class="row">
         <div class="col-md-7">
            <?if($item[0]) item_promo($item[0],'big', $count);?>

            <div class="row">
               <div class="col-md-6">
                  <?if($item[3]) item_promo($item[3],'small', $count);?>                  
               </div>
               <div class="col-md-6">
                  <?if($item[4]) item_promo($item[4],'small', $count);?>
               </div>
            </div>
         </div>
         
         <div class="col-md-5">
            <?/*
            <?if($APPLICATION->GetCurDir()=='/' && $i==0):?>
               <a class="block message medium" href="/materials/goryachaya-liniya-muzhskoe-zdorove-smelo-sprashivayte/">
                  <div class="c">
                     <h1>Не знаете, с чего начать?</h1>
                     <h2>Спросите у специалиста</h2>
                     <p>
                        На ваши вопросы ответит <strong>А.н.Берников</strong>, <br><small>к.м.н., доцент кафедры урологии МГМСУ</small>
                     </p>
                     <p class="phone">
                        Телефон горячей линии: <br><span>8 800 200 36 36</span>
                     </p>
                  </div>
               </a>
            <? else: ?>*/?>
               <?if($item[1]) item_promo($item[1],'medium', $count);?>
            <?/*<? endif;?>*/?>
            <?if($item[2]) item_promo($item[2],'medium', $count);?>
         </div>
      </div>
         
      <?
      $i++;
   }
   if($APPLICATION->GetCurDir()=='/'):
?>
   <a href="/materials/" id="more-link">Больше материалов</a>
<?
   endif;
?>
</div>