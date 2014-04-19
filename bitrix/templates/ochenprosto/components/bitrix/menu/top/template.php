<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):
	foreach($arResult as $arItem):
		?>
			<li>
               <a href="<?=$arItem['LINK']?>" class="<?=($arItem['SELECTED']?'active':'')?>" <?=($arItem['PARAMS']['ADDITIONAL']?$arItem['PARAMS']['ADDITIONAL']:'')?> class=""><?=$arItem['TEXT']?></a><br>
               <?=($arItem['PARAMS']['MORE']?"<span class='small'>".$arItem['PARAMS']['MORE']."</span>":'')?>
            </li>
		<?
	endforeach;
endif?>