<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
	foreach($arResult as $arItem):
		?>
			<li>
               <a href="<?=$arItem[1]?>" <?=($arItem[3]['ADDITIONAL']?$arItem[3]['ADDITIONAL']:'')?> class=""><?=$arItem[0]?></a><br>
               <?=($arItem[3]['MORE']?"<span class='small'>".$arItem[3]['MORE']."</span>":'')?>
            </li>
		<?
	endforeach;
?>
<?endif?>