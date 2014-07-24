<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$small = CFile::ResizeImageGet($item['DETAIL_PICTURE'], Array("width" => 1200, "height" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 70);
		$item['DETAIL_PICTURE']['SRC'] = $small['src'];
	endforeach;
?>

