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
//print_r($arUser);

?>

<div class="blog-block" style="  max-width: 800px; margin: auto;">
    <div class="blog-text">
        <div class="article">
            <h3><?=$arResult["NAME"]?></h3>
            <div class="author-date-wp">
				<hr>
                <span class="author">Автор: <?=$arUser['NAME'];?></span><br>
				<span class="date">Дата: <?=date("d.m.Y",strtotime($arResult["DATE_CREATE"]));?></span>
				<hr>
            </div>
            <div class="bold-line"></div>
            <?=$arResult['DETAIL_TEXT']?>
        </div>

        <div class="blog-autor" style="display: none;">
            <a href="/blog/" class="return">Назад к списку</a>
            <div class="blogAutor">
                <?echo CFile::ShowImage($arUser['PERSONAL_PHOTO'], 169, 169, 'border=0', '', true);?>
            </div>

            <!-- <span class="add-artic-ent">02,06,2014 </span> -->
        </div>
    </div>
</div>

