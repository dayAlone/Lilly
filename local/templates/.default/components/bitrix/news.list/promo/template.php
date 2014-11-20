<?
$this->setFrameMode(true);
$blank = false;
if(strlen($arParams['TARGET'])>0)
   $blank = true;
?>
<div id="promo">
<?
   function item_promo($item, $size, &$i, $blank) {
      echo '<a href="/materials/'.$item['CODE'].'/" '.($blank?"target='_blank'":"").' class="block '.$size.' '.($i==0?"first":"").'" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')">
                  <div class="shadow"></div>
                  <div class="image" style="background-image:url('.(file_exists($_SERVER['DOCUMENT_ROOT'].$item['PREVIEW_PICTURE']['SRC'])?$item['PREVIEW_PICTURE']['SRC']:"http://ochenprosto.ru".$item['PREVIEW_PICTURE']['SRC']).')"><div class="shadow"></div></div>
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
            <?if($item[0]) item_promo($item[0],'big', $count, $blank);?>

            <div class="row">
               <div class="col-md-6">
                  <?if($item[3]) item_promo($item[3],'small', $count, $blank);?>                  
               </div>
               <div class="col-md-6">
                  <?if($item[4]) item_promo($item[4],'small', $count, $blank);?>
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
               <?if($item[1]) item_promo($item[1],'medium', $count, $blank);?>
            <?/*<? endif;?>*/?>
            <?if($item[2]) item_promo($item[2],'medium', $count, $blank);?>
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