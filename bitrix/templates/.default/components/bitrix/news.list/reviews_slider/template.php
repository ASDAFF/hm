<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>








<script type="text/css">
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
</script>

<div class="container  text-block">
<!--** Blog Detail Starts Here **-->
    <article class="blog-post blog-single-entry">
        <div class="otziviList" id="owl-demo">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="column">
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

    <div style="text-align: center;">
        <a href="/reviews/" style=" padding: 8px">Все отзывы</a>
    </div>
</div>
<div class="hr-invisible-small"></div>


<script type="text/javascript">
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({


            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });

    });
</script>






