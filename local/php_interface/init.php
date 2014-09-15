<?	
	AddEventHandler("iblock", "OnAfterIBlockSectionAdd", "OnAfterIBlockSectionAddHandler");
	function OnAfterIBlockSectionAddHandler(&$arFields)
    {
        $SORT = $arFields["ID"]*100;
        $props = array("SORT" => $SORT);
        $bs = new CIBlockSection;
        $bs->Update($arFields["ID"], $props);
    }

	function mobile_title() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('mobile_title')) {
			return $APPLICATION->GetPageProperty('mobile_title');
		}
	}
	
	  if($_REQUEST['v']>0){
	  	var_dump( $_REQUEST['v']);
	    $_SESSION['v'] = $_REQUEST['v'];
	  }
?>