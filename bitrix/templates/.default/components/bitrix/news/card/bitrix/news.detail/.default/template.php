<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    var myMap,
        myPlacemark;

    function init(){
        myMap = new ymaps.Map("map", {
            center: [<?=$arResult['PROPERTIES']['MAP']['VALUE']?>],
            zoom: 17
        });

        myPlacemark = new ymaps.Placemark([<?=$arResult['PROPERTIES']['MAP']['VALUE']?>], {

        });

        myMap.geoObjects.add(myPlacemark);
    }
</script>

<div class="t_card">
    <div class="t_card_title">
       <?=$arResult['NAME']?>
    </div>
    <div class="t_card_site">
        <a href="<?=$arResult['PROPERTIES']['SITE']['VALUE']?>"><?=$arResult['PROPERTIES']['SITE']['VALUE']?></a>
    </div>
    <div class="t_card_slider">
        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            <?foreach($arResult['PROPERTIES']['IMG']['VALUE'] as $arImages):
                $arImagesSRC = CFile::GetPath($arImages);?>
                <li data-thumb="<?=$arImagesSRC;?>"> <img style="  height: 397px;margin: auto;display: block;" src=" <?=$arImagesSRC;?>"> </li>
           <?endforeach;?>
        </ul>
    </div>
    <div class="t_card_dop">
        <div>
            Время работы: <?=$arResult['PROPERTIES']['DATE_WORK']['VALUE']?>
        </div>
        <div>
            Телефон: <b><?=$arResult['PROPERTIES']['PHONE']['VALUE']?></b>
        </div>
        <div>
            Адрес: <?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?>
        </div>
    </div>

    <div class="t_card_btm">
        <!-- Tabs -->
        <div id="question">
            <div style="display:none">
                <div id="question_form">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	"question", 
	array(
		"USE_CAPTCHA" => "N",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => $arResult["PROPERTIES"]["EMAIL"]["VALUE"],
		"REQUIRED_FIELDS" => array(
			0 => "EMAIL",
			1 => "MESSAGE",
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "70",
		)
	),
	false
);?>
                </div>
            </div>
            <a class="fancybox" href="#question_form"></a>
        </div>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Описание</a></li>
                <li><a href="#tabs-2">Отзывы</a></li>
                <li><a href="#tabs-3">Карта</a></li>
            </ul>
            <div id="tabs-1">
               <?=$arResult['DETAIL_TEXT']?>
            </div>
            <div id="tabs-2">

                <div class="not_log_com">
                    <? if(!$USER->GetID()){ ?>
                        Чтобы оставлять комментарии вам необходимо <a href="#" class="main_btn_login">Войти</a> или <a href="#" class="main_btn_registr">Зарегистрироваться</a>
                    <?};?>
                </div>


                <?$GLOBALS['myFilter'] = array("PROPERTY_IDPAGE" => $arResult['ID']);?>

                <div class="comment_title" id="comment">
                    КОММЕНТАРИИ

                    <?if($USER->GetID()){?>
                        <div class="btn_add_com fancybox" href="#modalw">Оставить комментарий</div>
                    <?}?>
                </div>


                <div id="modalw" style="display: none;">

                    <?$APPLICATION->IncludeComponent("zaba:wm.user.reviews", "review_window", array(
                        "IDPAGE" => $arResult['ID'],
                        "IBLOCK_TYPE" => "comment",
                        "IBLOCK_ID" => "2",
                        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                        "EMAIL_TO" => "",
                        "REQUIRED_FIELDS" => array(
                            0 => "MESSAGE",
                        ),
                        "SHOW_FIELDS" => array(
                            0 => "MESSAGE",
                        ),
                        "EVENT_MESSAGE_ID" => array(
                        )
                    ),
                        false
                    );?>

                </div>


                <?$APPLICATION->IncludeComponent("bitrix:news.list", "text_comments", array(
                    "IBLOCK_TYPE" => "",
                    "IBLOCK_ID" => "2",
                    "NEWS_COUNT" => "20",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "myFilter",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
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
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
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
                ),
                    false
                );?>




            </div>
            <div id="tabs-3">
                <div id="map" style="width: 650px; height: 400px"></div>
            </div>
        </div>
        <script type="text/javascript">
            $( "#tabs" ).tabs();
        </script>
        <div class="t_card_detail">
        </div>
    </div>
</div>














