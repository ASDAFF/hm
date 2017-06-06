<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="nav">

        <?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>

            <?if($arItem["SELECTED"]):?>
            <li class="<?=$arItem['PARAMS']['class'];?>"><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a><?if($arItem['PARAMS']['class'] != ''):?><i class="bgPik" style="display: none;"></i><?endif;?></li>
        <?else:?>
            <li class="<?=$arItem['PARAMS']['class'];?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><?if($arItem['PARAMS']['class'] != ''):?><i class="bgPik" style="display: none;"><?endif;?></i></li>
        <?endif?>

        <?endforeach?>

    </ul>
<?endif?>