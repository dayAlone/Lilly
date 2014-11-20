<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);
?>
<?if (!empty($arResult)):?>

<?
	foreach($arResult as $arItem):
		?>
               <a href="<?=$arItem[1]?>" <?=($arItem[3]['ADDITIONAL']?$arItem[3]['ADDITIONAL']:'')?> class="<?=($arItem['SELECTED']?'active':'')?>"><?=$arItem[0]?></a>
		<?
	endforeach;
?>
<?endif?>