<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 600, "height" => 600), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 80);
		$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
	endforeach;
?>

