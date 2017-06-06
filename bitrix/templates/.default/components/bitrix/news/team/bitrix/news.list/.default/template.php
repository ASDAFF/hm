<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


?>

<section id="team" class="content team-snipet">
    <div class="tabs-container team-tab">


            <ul class="tabs-frame container snipet">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                <li class="dt-sc-one-third column">
                    <a href="#">
                        <div class="square">
                            <div class="pic">
                                <img src="<?=$arItem[DETAIL_PICTURE][SRC];?>" alt="">
                            </div>
                        </div>
                        <div class="image-overlay">
                            <h5><?=$arItem['NAME'];?></h5>
                            <h6><?=$arItem[PROPERTIES][OFFICE][VALUE];?></h6>
                        </div>
                    </a>
                </li>
                <?endforeach;?>
            </ul>


        <!-- Team Tab Ends here -->

    </div>
    <div class="hr-invisible"> </div>


    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</section>