<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(false);

if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0):
	foreach ($arResult['ITEMS'] as $arItem):
        
		$haveOffers = (is_array($arItem['OFFERS']) && count($arItem['OFFERS'])>0) ? true : false;
		if($haveOffers)
            $PRODUCT = &$arItem['OFFERS'][0];
        else
            $PRODUCT = &$arItem;
        
		?>
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="item catitem">
			<div class="inner clearfix">
				<span class="name">
					<?php if (isset($arItem['FIRST_PIC']['RESIZE']['src'])): ?>
						<span class="pic"><img class="icon" src="<?=$arItem['FIRST_PIC']['RESIZE']['src']?>" /></span>
					<?php endif; ?>
					<?=$arItem['NAME']?>
				</span>
				<span class="prs nowrap"><?=$PRODUCT['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?></span>
			</div>
		</a>
	<?php endforeach; ?>
<?php endif; ?>
