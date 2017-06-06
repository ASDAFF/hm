<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(true);
?>

<?php if (is_array($arResult["SECTIONS"]) && count($arResult["SECTIONS"]) > 0): ?>

	<div class="mainsections clearfix">
		<?php if (isset($arParams['BLOCK_NAME']) && $arParams['BLOCK_NAME'] != ''): ?>
			<div class="title"><?=$arParams['BLOCK_NAME']?></div>
		<?php endif; ?>
        
		<ul>
            <?php
			$previousLevel = 0;
			$index1 = 1;
            
			foreach($arResult['SECTIONS'] as $arSection):

				if ($index1 > ($arParams['SHOW_COUNT_LVL1']+1))
					break;
                
				if ($index1 > $arParams['SHOW_COUNT_LVL1'] && $arSection['DEPTH_LEVEL'] == $arResult['SECTION']['DEPTH_LEVEL'] + 1)
					continue;
                
				if ($arSection['DEPTH_LEVEL'] > $arResult['SECTION']['DEPTH_LEVEL'] + 2)
					continue;
                
				if ($previousLevel && $arSection['DEPTH_LEVEL'] < $previousLevel)
					echo str_repeat('</ul></li>', ($previousLevel - $arSection["DEPTH_LEVEL"]));
				
				if ($arSection["DEPTH_LEVEL"] == $arResult['SECTION']['DEPTH_LEVEL'] + 1): ?>
                    <?php
					$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
					$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                    ?>
					<li class="section" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                        <?php
                        $img = $arSection['PICTURE']['SRC'];
						if (empty($arSection['PICTURE']['SRC']))
							$img = $arResult['NO_PHOTO']['src'];
                        ?>
						<a class="around_image" href="<?=$arSection['SECTION_PAGE_URL']?>"><img src="<?=$img?>" alt="<?=$arSection['PICTURE']['ALT']?>" title="<?=$arSection['PICTURE']['TITLE']?>" /></a>
						<a class="parent" href="<?=$arSection['SECTION_PAGE_URL']?>" title="<?=$arSection['NAME']?>"><?=$arSection['NAME']?><?php if ($arParams['COUNT_ELEMENTS'] && intval($arSection['ELEMENT_CNT']) > 0): ?> (<?=$arSection['ELEMENT_CNT']?>)<?php endif;?></a>
						<?php if (($arSection["RIGHT_MARGIN"] - $arSection['LEFT_MARGIN']) > 1 && $arParams['SHOW_COUNT_LVL2'] > 0 && $arParams['TOP_DEPTH'] > 1): // is_parent ?>
							<ul class="subsections" id="<?=$arSection['ID']?>">
						<?php endif; ?>
                    <?php
					$index1++;
					$index2 = 1;
                    ?>
				<?php else: ?>
					<?php
                    if ($index2>$arParams['SHOW_COUNT_LVL2'])
						continue;
                    ?>
					<li><a href="<?=$arSection['SECTION_PAGE_URL']?>" title="<?=$arSection['NAME']?>"><?=$arSection['NAME']?><?php if ($arParams['COUNT_ELEMENTS'] && intval($arSection['ELEMENT_CNT']) > 0): ?> (<?=$arSection['ELEMENT_CNT']?>)<?php endif;?></a></li>
					<?php
                    $index2++;
                    ?>
				<?php endif; ?>
				<?php
                $previousLevel = $arSection['DEPTH_LEVEL'];
                ?>
			<?php endforeach; ?>
            
			<?php if ($previousLevel > 1): ?>
				<?=str_repeat('</ul></li>', ($previousLevel-1))?>
			<?php endif; ?>
            
		</ul>
	</div>
    
<?php endif; ?>
