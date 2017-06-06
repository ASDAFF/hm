<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(true);

$this->SetViewTarget('paginator');
if ($arParams['IS_AJAXPAGES'] != "Y" && $arParams['DISPLAY_TOP_PAGER'] == 'Y') {
	echo $arResult['NAV_STRING'];
}
$this->EndViewTarget();

if (isset($arResult['ITEMS'])) {
	?><div class="light clearfix"><?
		foreach ($arResult['ITEMS'] as $key1 => $arItem) {
            
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT'));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
            $strMainID = $this->GetEditAreaId($arItem['ID']);
            
			$haveOffers = (is_array($arItem['OFFERS']) && count($arItem['OFFERS']) > 0) ? true : false;
			if ($haveOffers)
                $PRODUCT = &$arItem['OFFERS'][0];
            else
                $PRODUCT = &$arItem;
            
            if($arItem['CATALOG_SUBSCRIBE'] == 'Y')
                $showSubscribeBtn = true;
            else
                $showSubscribeBtn = false;
            
            $canBuy = $PRODUCT['CAN_BUY'];
            
			?><div class="js-element js-elementid<?=$arItem['ID']?> <?if($haveOffers):?>offers<?else:?>simple<?endif;?>" data-elementid="<?=$arItem['ID']?>" data-detail="<?=$arItem['DETAIL_PAGE_URL']?>" id="<?=$this->GetEditAreaId($arItem["ID"]);?>"><?
				?><div class="name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div><?
				?><div class="pic"><?
					// PICTURE
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?
						if (isset($arItem['FIRST_PIC'])) {
							?><img src="<?=$arItem['FIRST_PIC']['RESIZE']['src']?>" alt="<?=$arItem['FIRST_PIC']['ALT']?>" title="<?=$arItem['FIRST_PIC']['TITLE']?>" /><?
						} else {
							?><img src="<?=$arResult['NO_PHOTO']['src']?>" title="<?=$arItem['NAME']?>" alt="<?=$arItem['NAME']?>" /><?
						}
					?></a><?
				?></div><?
				// PRICE
				if (isset($arItem['MIN_PRICE'])) {
					?><div class="prices"><?
                        if ($arParams['USE_PRICE_COUNT']) {
                            foreach ($PRODUCT['PRICE_MATRIX']['COLS'] as $typeID => $arType) {
                                $arPrice = $PRODUCT['PRICE_MATRIX']['MATRIX'][$typeID][0];
                                ?><?=$arPrice['PRINT_DISCOUNT_VALUE']?><?
                                break;
                            }
                        } else {
                            ?><?=$PRODUCT['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?><?
                        }
                    ?></div><?
				}
				// ADD2BASKET
				?><noindex><div class="buy clearfix"><?
				if ($haveOffers) {
					$BUY_ID = 0;//$arItem['OFFERS'][0]['ID'];
					?><a rel="nofollow" class="go2detail btn3" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME']?>"><?=GetMessage('GO2DETAIL')?></a><?
				} else {
					$BUY_ID = $PRODUCT['ID'];
					?><form class="add2basketform js-buyform<?=$arItem['ID']?> js-synchro<?if(!$PRODUCT['CAN_BUY']):?> cantbuy<?endif;?> clearfix" name="add2basketform"><?
						?><input type="hidden" name="<?=$arParams['ACTION_VARIABLE']?>" value="ADD2BASKET"><?
						?><input type="hidden" name="<?=$arParams['PRODUCT_ID_VARIABLE']?>" class="js-add2basketpid" value="<?=$BUY_ID?>"><?
						?><a rel="nofollow" class="submit add2basket btn1" href="#" title="<?=GetMessage('ADD2BASKET')?>"><?=GetMessage('CT_BCE_CATALOG_ADD')?></a><?
                         // SUBSCRIBE
                        if ($showSubscribeBtn):
                            $APPLICATION->includeComponent('bitrix:catalog.product.subscribe', 'gopro',
                                array(
                                    'PRODUCT_ID' => $arItem['ID'],
                                    'BUTTON_ID' => $strMainID.'_subscribe_link',
                                    'BUTTON_CLASS' => 'btn3',
                                    'DEFAULT_DISPLAY' => true,
                                ),
                                $component,
                                array('HIDE_ICONS' => 'Y')
                            );
                        endif;
						?><a rel="nofollow" class="inbasket btn2" href="<?=$arParams['BASKET_URL']?>" title="<?=GetMessage('INBASKET_TITLE')?>"><?=GetMessage('INBASKET')?></a><?
						?><input type="submit" name="submit" class="noned" value="" /><?
					?></form><?
				}
				?></div></noindex><?
			?></div><?
		}
	?></div><?
}
