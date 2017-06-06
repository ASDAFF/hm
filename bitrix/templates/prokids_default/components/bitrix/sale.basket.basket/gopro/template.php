<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

$APPLICATION->AddHeadScript($templateFolder.'/script.js');

include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/functions.php");

// echo"<pre>";print_r($arResult);echo"</pre>";

$haveProducts = false;
if (
	$arResult['HAVE_PRODUCT_TYPE']['ITEMS'] == true ||
	$arResult['HAVE_PRODUCT_TYPE']['DELAYED'] == true ||
	$arResult['HAVE_PRODUCT_TYPE']['NOT_AVAILABLE'] == true ||
	$arResult['HAVE_PRODUCT_TYPE']['SUBSCRIBED'] == true
) {
	$haveProducts = true;
}

?>

<div class="basket">

	<?php if (!$haveProducts): ?>
		<div class="basket__empty-cart">
			<p><svg class="svg-icon basket__empty-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-shopping-cart"></use></svg></p>
			<p><?=Loc::getMessage('EMPTY_CART');?></p>
            <?php if ($arParams['CATALOG_LINK'] != ''): ?>
                <p><a class="btn1" href="<?=$arParams['CATALOG_LINK']?>"><?=Loc::getMessage('EMPTY_CART_LINK2CATALOG');?></a></p>
            <?php endif; ?>
		</div>
	<?php elseif (strlen($arResult['ERROR_MESSAGE']) <= 0): ?>
	
		<?php if (is_array($arResult['WARNING_MESSAGE']) && !empty($arResult['WARNING_MESSAGE'])): ?>
			<?php foreach ($arResult['WARNING_MESSAGE'] as $v): ?>
				echo ShowError($v);
			<?php endforeach; ?>
		<?php endif; ?>
		
		<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
			<div id="basket_form_container">
				<div class="bx_ordercart">
					
					<?php
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_delayed.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_subscribed.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_not_available.php");
					?>
					
				</div>
			</div>
			<input class="nonep hiddensubmit" type="submit" name="BasketRefresh" value="<?=GetMessage('SALE_ACCEPT')?>" />
			<input type="hidden" name="BasketOrder" value="BasketOrder" />
		</form>
	<?php else: ?>
		<?ShowError($arResult['ERROR_MESSAGE']);?>
	<?php endif; ?>

</div>

<script>
$('html').removeClass('hidedefaultwaitwindow');
</script>
