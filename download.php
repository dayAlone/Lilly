<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header("Content-disposition: attachment; filename=".str_replace('/upload/iblock/','',CFile::GetPath($_REQUEST['f'])));
header("Content-type: application/pdf");
readfile($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($_REQUEST['f']));
?>