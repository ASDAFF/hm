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




    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?
        $rsUser = CUser::GetByID($arItem["CREATED_BY"]);
        $arUser = $rsUser->Fetch();
//echo "<pre>";
//       print_r($arItem['DATE_CREATE']);
        ?>
        <div class="blog-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="blog-text">
                <div class="article">
                    <a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="title"><?=$arItem['NAME'];?></a>
                    <div class="author-date-wp">
                        <span class="author">Автор: <?=$arUser['NAME'];?></span>
                    </div>
                    <?=$arItem['PREVIEW_TEXT'];?>
                    <a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="more more-blog">Подробнее</a>
                </div>
                <div class="blog-autor">
                    <?if($arItem['DATE_CREATE']):?>
                        <span class="add-artic"><?=date("d.m.Y",strtotime($arItem['DATE_CREATE']));?></span>
                    <?endif;?>
                    <div><?echo CFile::ShowImage($arUser['PERSONAL_PHOTO'], 169, 169, 'border=0', '', true);?></div>
                </div>
            </div>
        </div>
    <?endforeach;?>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>

<?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/phone_adress_inside_right.php"?>