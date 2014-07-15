<?	
	function mobile_title() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('mobile_title')) {
			return $APPLICATION->GetPageProperty('mobile_title');
		}
	}
?>