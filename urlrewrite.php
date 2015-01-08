<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/doctors/video/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/doctors/video/index.php",
	),
	array(
		"CONDITION" => "#^/doctors/video/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/doctors/video/index.php",
	),
	array(
		"CONDITION" => "#^/materials/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/materials/index.php",
	),
	array(
		"CONDITION" => "#^/materials/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/materials/index.php",
	),
	array(
		"CONDITION" => "#^/woman/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/woman/index.php",
	),
	array(
		"CONDITION" => "#^/woman/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/woman/index.php",
	),
	array(
		"CONDITION" => "#^/enter/v/#",
		"RULE" => "v=2",
		"ID" => "",
		"PATH" => "/enter/index.php",
	),
);

?>