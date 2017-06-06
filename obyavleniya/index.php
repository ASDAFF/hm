<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Объявления");
?>
    <div class="content_width clear_fix">

        <?
        $APPLICATION->IncludeFile(
            SITE_DIR."/bitrix/templates/.default/inc/r_column.php",
            Array(),
            Array("MODE"=>"html")
        );
        ?>

        <div class="s_left_column">

            <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "main_tsep",
                Array(
                )
            );?>
            <? /*
		<div class="txt_head_name txt_head_name_left clear_fix">
			<h2>Новости</h2><a href="/news/">все новости</a>
		</div>
*/ ?>

            <?$APPLICATION->IncludeComponent(
                "zaba:wm.adver",
                "",
                Array(
                    "USE_CAPTCHA" => "Y",
                    "IBLOCK_TYPE" => "obyavleniya",
                    "IBLOCK_ID" => "22",
                    "IBLOCK_TYPE_COMMENT" => "obyavleniya",
                    "IBLOCK_ID_COMMENT" => "23"
                )
            );?>




        </div>



    </div>

<?if($GLOBALS['zabaParams']['ispage'] == 'Y'){?>

    <div class="blue_moon oblakaski">
        <div class="content_width txt_head_name clear_fix">
            <h2>Другие статьи</h2>
            <div>
                <?
                $APPLICATION->IncludeFile(
                    SITE_DIR."include/statyi_text.php",
                    Array(),
                    Array("MODE"=>"html")
                );
                ?>
            </div>
        </div>



        <div class="content_width clear_fix">
            <div class="statyi_list statyi_list_blue clear_fix">

                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "inner_page_articles",
                    Array(
                        "IBLOCK_TYPE" => "content",
                        "IBLOCK_ID" => "7",
                        "NEWS_COUNT" => "4",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => array(0=>"",1=>"",),
                        "PROPERTY_CODE" => array(0=>"",1=>"",),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
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
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "PAGER_TEMPLATE" => ".default",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => ""
                    )
                );?>

            </div>
        </div>
    </div>

<?}?>

    <br><br>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>