<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

        <div id="primary">
            <!--** Blog Detail Starts Here **-->
            <article class="blog-post blog-single-entry">
                <div class="otziviList">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <div class="hr-border-thin"> </div>
                    <div class=" column ">
                        <div class="dt-sc-ico-content type3">
                            <img alt="" src="<?=$arItem[DETAIL_PICTURE][SRC];?> ">
                            <h6><?=$arItem["NAME"];?></h6>
                            <p class="otziviBold"><?=$arItem[PROPERTIES][OFFICE][VALUE];?></p>
                            <p><?=$arItem[DETAIL_TEXT];?></p>
                        </div>
                    </div>
                    <?endforeach;?>

                </div>
            </article>
            <!--** Blog Detail Ends Here **-->
            <div class="hr-invisible-small"></div>
        </div>

<script type="text/javascript">
    $(document).ready(function() {

        $("a.gallery").fancybox(
            {
                "padding" : 20, // отступ контента от краев окна
                "imageScale" : false, // Принимает значение true - контент(изображения) масштабируется по размеру окна, или false - окно вытягивается по размеру контента. По умолчанию - TRUE
                "zoomOpacity" : false,	// изменение прозрачности контента во время анимации (по умолчанию false)
                "zoomSpeedIn" : 1000,	// скорость анимации в мс при увеличении фото (по умолчанию 0)
                "zoomSpeedOut" : 1000,	// скорость анимации в мс при уменьшении фото (по умолчанию 0)
                "zoomSpeedChange" : 1000, // скорость анимации в мс при смене фото (по умолчанию 0)
                "frameWidth" : 700,	 // ширина окна, px (425px - по умолчанию)
                "frameHeight" : 600, // высота окна, px(355px - по умолчанию)
                "overlayShow" : true, // если true затеняят страницу под всплывающим окном. (по умолчанию true). Цвет задается в jquery.fancybox.css - div#fancy_overlay
                "overlayOpacity" : 0.8,	 // Прозрачность затенения 	(0.3 по умолчанию)
                "hideOnContentClick" :false, // Если TRUE  закрывает окно по клику по любой его точке (кроме элементов навигации). Поумолчанию TRUE
                "centerOnScroll" : false // Если TRUE окно центрируется на экране, когда пользователь прокручивает страницу

            });

    });




</script>

<div class="reviewed-images">
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r1_big.jpg"> <img src="images/reviewed/r1.jpg" alt=""></a>
    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r2_big.jpg">  <img src="images/reviewed/r2.jpg" alt=""></a>
    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r3_big.jpg"> <img src="images/reviewed/r3.jpg" alt=""></a>
    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r4_big.jpg"><img src="images/reviewed/r4.jpg" alt=""></a>
    </div>
    <div class="revi-block"><a class="gallery" rel="group" href="images/reviewed/r5_big.jpg"><img src="images/reviewed/r5.jpg" alt=""></a>
    </div>
    <div class="revi-block"><a class="gallery" rel="group" href="images/reviewed/r6_big.jpg"><img src="images/reviewed/r6.jpg" alt=""></a>
    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r7_big.jpg"><img src="images/reviewed/7.jpg" alt=""></a>
    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r8_big.jpg"> <img src="images/reviewed/8.jpg" alt=""></a>

    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r9_big.jpg"><img src="images/reviewed/r9.jpg" alt=""></a>

    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r9_big.jpg"><img src="images/reviewed/r10.jpg" alt=""></a>

    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r10_big.jpg"><img src="images/reviewed/r11.jpg" alt=""></a>

    </div>
    <div class="revi-block">
        <a class="gallery" rel="group" href="images/reviewed/r12_big.jpg"><img src="images/reviewed/r12.jpg" alt=""></a>

    </div>

    <div class="clear"></div>
</div>


