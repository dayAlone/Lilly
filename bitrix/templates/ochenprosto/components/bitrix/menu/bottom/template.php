<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
	foreach($arResult as $arItem):
		?>
               <a href="<?=$arItem[1]?>" <?=($arItem[3]['ADDITIONAL']?$arItem[3]['ADDITIONAL']:'')?> class=""><?=$arItem[0]?></a>
		<?
	endforeach;
?>
<?endif?>