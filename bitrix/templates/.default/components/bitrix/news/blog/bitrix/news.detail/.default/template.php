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
// Картинка автора
//echo "<pre>";
//print_r($arResult['FIELDS']['CREATED_BY']);

$rsUser = CUser::GetByID($arResult["CREATED_BY"]);
$arUser = $rsUser->Fetch();


// Id пользователя
//echo "<pre>";
//print_r($arUser['NAME']);

?>

<div class="blog-block">
    <div class="blog-text">
        <div class="article">
            <h3><?=$arResult["NAME"]?></h3>
            <div class="author-date-wp">
                <span class="author">Автор: <?=$arUser['NAME'];?></span>
                <span class="date"><?=date("d.m.Y",strtotime($arResult["DATE_CREATE"]));?></span>
            </div>
            <div class="bold-line"></div>
            <?=$arResult['DETAIL_TEXT']?>
        </div>

        <div class="blog-autor">
            <a href="/blog/" class="return">Назад к списку</a>
            <div class="blogAutor">
                <?echo CFile::ShowImage($arUser['PERSONAL_PHOTO'], 169, 169, 'border=0', '', true);?>
            </div>

            <!-- <span class="add-artic-ent">02,06,2014 </span> -->
        </div>
    </div>
</div>
<?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/phone_adress_inside_right.php"?>
<br /><br /><br /><br />
