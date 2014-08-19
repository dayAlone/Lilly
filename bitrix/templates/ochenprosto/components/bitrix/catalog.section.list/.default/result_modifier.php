<?
function sort_sections($a, $b)
{
    if ($a['SORT'] == $b['SORT']){
        if ($a['ID'] == $b['ID']){
	        return 0;
	    }
	    return ($a['ID'] > $b['ID']) ? -1 : 1;
    }
    return ($a['SORT'] > $b['SORT']) ? -1 : 1;
}
usort($arResult['SECTIONS'], "sort_sections");
?>