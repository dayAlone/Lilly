<?	
	define("BX_COMPOSITE_DEBUG", true);
	define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");
	function mobile_title() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('mobile_title')) {
			return $APPLICATION->GetPageProperty('mobile_title');
		}
	}
?>