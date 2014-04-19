<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/materials/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/materials/index.php",
	),
);

?>