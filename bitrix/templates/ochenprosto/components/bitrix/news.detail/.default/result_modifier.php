<?
	
	$small = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], Array("width" => 1200, "height" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 70);
	$arResult['DETAIL_PICTURE']['SRC'] = $small['src'];
	$db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], false);
	$arResult['CATEGORIES'] = array();
	while($ar_group = $db_old_groups->Fetch())
		$arResult['CATEGORIES'][] = $ar_group["ID"];
	
	$arFilter = array(
		                "ACTIVE"     => "Y",
		                "IBLOCK_ID"  => $arResult["IBLOCK_ID"],
		                "SECTION_ID" => $arResult['CATEGORIES'][count($arResult['CATEGORIES'])-1]
		                );
	if($arResult['PROPERTIES']['PARENT']['VALUE']>0)
		$arFilter["PROPERTY_PARENT"] = $arResult['PROPERTIES']['PARENT']['VALUE'];
	$rs = CIBlockElement::GetList(array("ID" => "desc"), 
									$arFilter, 
									false, 
									array("nElementID"=>$arResult["ID"], "nPageSize"=>1), 
									array("ID","CODE","NAME")
	); 
	while($ar=$rs->GetNext()) 
		$page[] = $ar;
	$arResult['NEXT'] = false;
	$arResult['PREV'] = false;
	
	if (count($page) == 2 && $arResult["ID"] == $page[0]['ID'])
		$arResult['PREV'] = $page[1];
	else if (count($page) == 3) 
	{
		$arResult['PREV'] = $page[2];
		$arResult['NEXT'] = $page[0];
	}
	else if (count($page) == 2 && $arResult["ID"] == $page[1]['ID'])
		$arResult['NEXT'] = $page[0];


	if($arResult['PROPERTIES']['PARENT']['VALUE']>0 && !$arResult['PREV']){
		$res = CIBlockElement::GetByID($arResult['PROPERTIES']['PARENT']['VALUE']);
		if($ar_res = $res->GetNext())
		  $arResult['PREV']=array('NAME'=>$ar_res['NAME'],'CODE'=>$ar_res['CODE']);
	}

?>

