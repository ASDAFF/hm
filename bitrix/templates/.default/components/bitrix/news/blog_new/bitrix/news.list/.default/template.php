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
        //print_r($arUser);

        ?>
<?//echo CFile::ShowImage($arUser['PERSONAL_PHOTO'], 169, 169, 'border=0', '', true);?>
<article class="blog-post blog-single-entry blogList">
                                <div class="entry-description">
                                    <div class="entry-details">
                                        <div class="entry-info">
                                            <div class="entry-meta">
                                                <div class="date">
                                                <?if($arItem['DATE_CREATE']):?>
                                                <p><?=date("d.m.Y",strtotime($arItem['DATE_CREATE']));?></p>
                                                <?endif;?>
                                                </div>

                                            </div>
                                            <div class="entry-title">
                                                <h4> <a title="" href="<?=$arItem['DETAIL_PAGE_URL'];?>"> <?=$arItem['NAME'];?></a> </h4>
                                            </div>
                                            <div class="entry-metadata">
                                            <?if($arUser['NAME']):?>
                                                <p class="author"> <i class="fa fa-user"></i> Автор: <?=$arUser['NAME'];?> </p>
                                            <?endif;?>

                                            </div>
                                        </div>
                                        <div class="entry-body">
                                            
                                             <?=$arItem['PREVIEW_TEXT'];?>
                                            <p><a style="text-decoration: underline; display: block; text-align: center" href="<?= $arItem['DETAIL_PAGE_URL']; ?>">Подробнее</a></p>
                                            <div class="hr-invisible-very-small"> </div>
                                        </div>
                                    </div>
                                    <div class="hr-invisible-very-small"> </div>

                                    <!--** Comments List Starts Here **-->



                                    <!--** Comments List Ends Here **-->

                                    <!-- **Respond Form Starts Here ** -->



                                    <!--**Respond Form Ends Here**-->

                                </div>

                            </article>
 <?endforeach;?>
   <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>

