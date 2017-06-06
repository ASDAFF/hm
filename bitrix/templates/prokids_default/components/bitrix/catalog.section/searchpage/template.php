<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(false);

if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0):
	foreach ($arResult['ITEMS'] as $arItem):
        
		$haveOffers = (is_array($arItem['OFFERS']) && count($arItem['OFFERS']) > 0) ? true : false;
		if($haveOffers)
            $PRODUCT = &$arItem['OFFERS'][0];
        else
            $PRODUCT = &$arItem;
        
		?>
        <div class="sitem catitem">
			<div class="inner clearfix">
				<?php if (isset($arItem['FIRST_PIC']['RESIZE']['src'])): ?>
					<a class="pic" href="<?=$arItem['DETAIL_PAGE_URL']?>"><img class="icon" src="<?=$arItem['FIRST_PIC']['RESIZE']['src']?>" /></a>
				<?php else: ?>
					<a class="pic" href="<?=$arItem['DETAIL_PAGE_URL']?>"><img class="icon" src="<?=$arResult['NO_PHOTO']['src']?>" /></a>
				<?php endif; ?>
				<div class="telo">
					<div class="name">
						<a class="nm" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
						<span class="chain">
                            <?php
							$path = array();
							foreach($arItem['SECTION']['PATH'] as $arPath){
								$path[] = '<a href="'.$arPath['SECTION_PAGE_URL'].'">'.$arPath['NAME'].'</a>';
							}
							echo implode('<span class="icon pngicons"></span>', $path);
                            ?>
						</span>
					</div>
					<div class="description"><?=$arItem['PREVIEW_TEXT']?></div>
					<div class="price new nowrap"><?=$PRODUCT['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
