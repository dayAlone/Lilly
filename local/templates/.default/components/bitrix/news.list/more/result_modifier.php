<?
	if(isset($arParams['CURRENT'])):
		$currentSort = 0;
		$currentID = $arParams['CURRENT'];
		foreach ($arResult['ITEMS'] as $key => &$item):
			if($item['ID'] == $currentID) 
				$currentSort = $key;
		endforeach;
		if(count($arResult['ITEMS'])>=5):
		?>
		<script type="text/javascript" charset="utf-8" async defer>
          $(function(){
            slick = $('#chapter-list').slick({
              slidesToShow: 5,
              slidesToScroll: 5,
              
              infinite: false,
              responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 5
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 3
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 2
			      }
			    }],
              onInit: function(){
              	$('.slick-slide[index="<?=$currentSort?>"]').addClass('slick-current')
              }
            })
            slick.slickGoTo(<?=$currentSort?>)

          })
        </script>
		<?
		else:
			unset($arResult['ITEMS'][$currentSort]);
		endif;
	endif;
	foreach ($arResult['ITEMS'] as $key => &$item):
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 300, "height" => 300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 80);
		$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
	endforeach;
?>

