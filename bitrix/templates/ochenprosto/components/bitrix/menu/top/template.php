<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):
	
	foreach($arResult as $arItem):
		?>
			<?if($arItem['DEPTH_LEVEL']==1){?><li>
               <a href="<?=$arItem['LINK']?>" class="<?=($arItem['SELECTED']?'active':'')?>" <?=($arItem['PARAMS']['ADDITIONAL']?$arItem['PARAMS']['ADDITIONAL']:'')?>><?=$arItem['TEXT']?></a><br>
               <?=($arItem['PARAMS']['MORE']?"<span class='small'>".$arItem['PARAMS']['MORE']."</span>":'')?>
            <?}else{?>
				<a href="<?=$arItem['LINK']?>" class="small <?=($arItem['SELECTED']?'active':'')?>"><?=$arItem['TEXT']?></a><br>
            <?
            }
            if(!$arItem['IS_PARENT']&&$arItem['DEPTH_LEVEL']==1){?></li><?}?>
		<?
	endforeach;
endif?>