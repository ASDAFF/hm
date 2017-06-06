<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="adver_itm">
		<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?>
			<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="fancybox adver_image" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')"></a>
		<?}?>
		<h3>
			<span><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
			<?=$arItem["NAME"]?>
		</h3>
		<div><?=$arItem["PREVIEW_TEXT"]?></div>

		<div>
			<div class="adver_itm_detail">
				<?=$arItem["DETAIL_TEXT"]?>

				<div style="clear: both;">
					<?
					$GLOBALS["arrFinderIn"] = array("DETAIL_TEXT"=>$arItem["ID"]);

					$APPLICATION->IncludeComponent("bitrix:news.list", "adver_answer", array(
							"IBLOCK_TYPE" => "-",
							"IBLOCK_ID" => $arParams["IBLOCK_ID_COMMENT"],
							"NEWS_COUNT" => "",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_ORDER1" => "ASC",
							"SORT_BY2" => "SORT",
							"SORT_ORDER2" => "ASC",
							"FILTER_NAME" => "arrFinderIn",
							"FIELD_CODE" => array(
								//0 => "DETAIL_TEXT",
							),
							"PROPERTY_CODE" => array(
								0 => "",
							),
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "?ID=#ELEMENT_ID#",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"AJAX_OPTION_HISTORY" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"PREVIEW_TRUNCATE_LEN" => "",
							"ACTIVE_DATE_FORMAT" => "j F Y",
							"SET_STATUS_404" => "Y",
							"SET_TITLE" => "N",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"ADD_SECTIONS_CHAIN" => "N",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"INCLUDE_SUBSECTIONS" => "Y",
							"PAGER_TEMPLATE" => ".default",
							"DISPLAY_TOP_PAGER" => "N",
							"DISPLAY_BOTTOM_PAGER" => "Y",
							"PAGER_TITLE" => "Новости",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "Y",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_DETAIL_TEXT" => "Y",
							"AJAX_OPTION_ADDITIONAL" => ""
						),
						$component->__parent
					);
					?>
				</div>

				<a class="fancybox zaba_button zaba_button_open" id="newadver_btn<?=$arItem['ID']?>" href="#newadver">
					Оставить комментарий
					<input type="hidden" class="adv_answer_id" value="<?=$arItem['ID']?>">
				</a>
			</div>
			<div class="adver_itm_show">
				Подробнее
			</div>
		</div>
	</div>
<?}?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>