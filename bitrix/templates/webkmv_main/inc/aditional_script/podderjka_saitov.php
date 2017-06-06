<style>
    .scope-support {margin-bottom: 0}
    .service-1 {background: url("/bitrix/templates/webkmv_main/images/uslugi/icon-1.png") no-repeat center top;width: 100%;height: 132px;}
    .service-1:hover {background-position: center bottom;}
    .service-2 {background: url("/bitrix/templates/webkmv_main/images/uslugi/icon-2.png") no-repeat center top;width: 100%;height: 132px;}
    .service-2:hover {background-position: center bottom;}
    .service-3 {background: url("/bitrix/templates/webkmv_main/images/uslugi/icon-3.png") no-repeat center top;width: 100%;height: 132px;}
    .service-3:hover {background-position: center bottom;}
    .service-4 {background: url("/bitrix/templates/webkmv_main/images/uslugi/icon-4.png") no-repeat center top;width: 100%;height: 132px;}
    .service-4:hover {background-position: center bottom;}
    .service-5 {background: url("/bitrix/templates/webkmv_main/images/uslugi/icon-5.png") no-repeat center top;width: 100%;height: 132px;}
    .service-5:hover {background-position: center bottom;}
    .list-service ul li {float: left;width: 20%;text-align: center;padding: 0;}
    .list-service  ul li:before {background: none;}
    .service-me-text {font: 14px "noto_sansbold_italic";color: #2e2e2e;line-height: 15px;margin-top: 8px;}
    .service-me-text span {font: 13px "Noto Sans";font-style: italic;display: block;margin-top: 10px;}
    .list-service .service-1 a {display: block;width: 100%;height: 100%;}
    .list-service .service-2 a {display: block;width: 100%;height: 100%;}
    .list-service .service-3 a {display: block;width: 100%;height: 100%;}
    .list-service .service-4 a {display: block;width: 100%;height: 100%;}
    .list-service .service-5 a {display: block;width: 100%;height: 100%;}
    .list-service-active ul {}
    .list-service-active ul li {line-height: 153%;float: none;width: 100%;text-align: left;padding-left: 15px;font-weight: 400;margin-bottom: 2px;}
    .list-service-active ul li:before {background: #f75931}
    .list-service-active {padding: 27px 38px 17px;border: 5px solid #ebebeb;font-family: "Noto Sans";position: relative;margin-top: 30px;}
    .servcice-work {display: inline-block;*display: block; zoom: 1;text-align: center;padding: 12px 35px;}
    .servcice-work-btn {text-align: center;margin: 32px 0;}
    .service-clients {display: block;margin: 20px auto 0;}
    .service-preimushestva-one {background: url("/bitrix/templates/webkmv_main/images/number-1.png") no-repeat;min-height: 100px;}
    .service-preimushestva-two {background: url("/bitrix/templates/webkmv_main/images/number-2.png") no-repeat;min-height: 100px;}
    .service-preimushestva-three {background: url("/bitrix/templates/webkmv_main/images/number-3.png") no-repeat;min-height: 100px;}
    .service-preimushestva li {padding-left: 90px!important;margin-bottom: 0!important;}
    .service-preimushestva li:before {background: none!important;}
    .service-shema {display: block;margin: 0 auto;}
    .block-me-bl {display: none;}
    .super-right-ul {float: right;width: 48%;}
    .super-left-ul {float: left;width: 48%;}
    .preim {margin-top: 45px;margin-bottom: 36px;}
    /*td:hover {background: #fde2a2}*/
    .high-td {background: #fde2a2}
    .our_tarif {margin-top: 25px;margin-bottom: 75px;}
    .our_tarif tr th {height: 42px;border-right: 3px solid #fff;background: #f2f2f2;color: #919190;font-weight: normal;text-transform: uppercase;font-size: 14px;color: #919190;}
    .our_tarif tr:first-child + tr td {padding-top: 0!important;}
    .our_tarif tr th:first-child {text-align: left!important;width: 240px!important;}
    .f-weight {font-weight: normal!important;font-size: 14px;}
    .sroki_me {color: #919190;}
    .tarif_me {padding-left: 20px;}
    .viberi_me {background: #ed603c!important;font-size: 14px;}
    .viberi_me a {font-size: 14px;color: #fff;display: block;width: 100%;height: 100%;line-height: 41px;}
    .viberi_me:hover {background: #ff8900;}
    .viberi_me a:hover {text-decoration: underline;}
    .epilog_me {border-left: 4px solid #ed603c;font-size: 15px;font-style: italic;padding-left: 20px;padding-top: 5px;padding-bottom: 5px;}
    .epilog_me b {font-weight: bold;}
    .service_our_tarif {margin-bottom: 10px!important;}
    .epilog_me i {font-weight: bold;color: #ed603c;}
    .tehnik-vopros {font-weight: bold;font-size: 16px;color: #2e2e2e;text-transform: uppercase;margin-bottom: 13px;}
    .list-service-active-img {width: 39px;height: 38px;position: absolute;top: -38px;left: 0;background: url("/bitrix/templates/webkmv_main/images/strelka.png") no-repeat}
    body .me_h3 {font: 23px "russo_oneregular"!important;text-transform: uppercase;color: #514f4f;}
    .our_tarif tr td {border-right: 3px solid #fff;}
    body .viberi_me:hover {background: #ff8900!important;}
    .nachat-rabotu-btn {margin: 54px 0 0;height: 34px;}
    .nachat-rabotu {background: none;color: #ed603c;border: 1px solid #ed603c;padding: 12px 35px;}
    .nachat-rabotu span {border-bottom-color: #ed603c!important;color: #ed603c!important;}
    .nachat-rabotu:hover {background: #ed603c;color: #fff!important;}
    .nachat-rabotu:hover span {color: #fff!important;border-bottom: 1px dotted #fff!important;}
    .new_tarif_our {margin-bottom: 70px!important;}
    .our_tarif.table tr th:first-child {
        /*width: auto!important;*/
    }
    .our_tarif.table tr td:first-child {
        font-weight: bold!important;
    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.7);
        bottom: 0;
        cursor: default;
        left: 0;
        opacity: 0;
        position: fixed;
        right: 0;
        top: 0;
        visibility: hidden;
        z-index: 99999;
        -webkit-transition: opacity .5s;
        -moz-transition: opacity .5s;
        -ms-transition: opacity .5s;
        -o-transition: opacity .5s;
        transition: opacity .5s;
    }
    .popup {
        background-color: #fff;
        border: 3px solid #fff;
        display: inline-block;
        left: 50%;
        opacity: 0;
        padding: 30px 5px;
        width: 270px;
        position: fixed;
        text-align: justify;
        top: 40%;
        visibility: hidden;
        z-index: 999999;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: opacity .5s, top .5s;
        -moz-transition: opacity .5s, top .5s;
        -ms-transition: opacity .5s, top .5s;
        -o-transition: opacity .5s, top .5s;
        transition: opacity .5s, top .5s;
        border-radius: 11px;
    }
    .popup .close_order {
        width: 6px;
        height: 17px;
        position: absolute;
        padding: 1px 9px 4px 9px;
        top: 3px;
        right: 15px;
        cursor: pointer;
        color: #fff;
        font-family: 'tahoma', sans-serif;



        text-align: center;

    }
    .popup .close_order:hover {

    }
    .popup .close_order:active {

    }



    @font-face {
        font-family: 'noto_sansbold_italic';
        src: url('/bitrix/templates/webkmv_main/style/fonts/notosans_bolditalic_cyrillic/NotoSans-BoldItalic-webfont.eot');
        src: url('/bitrix/templates/webkmv_main/style/fonts/notosans_bolditalic_cyrillic/NotoSans-BoldItalic-webfont.eot?#iefix') format('embedded-opentype'),
        url('/bitrix/templates/webkmv_main/style/fonts/notosans_bolditalic_cyrillic/NotoSans-BoldItalic-webfont.woff') format('woff'),
        url('/bitrix/templates/webkmv_main/style/fonts/notosans_bolditalic_cyrillic/NotoSans-BoldItalic-webfont.ttf') format('truetype'),
        url('/bitrix/templates/webkmv_main/style/fonts/notosans_bolditalic_cyrillic/NotoSans-BoldItalic-webfont.svg#noto_sansbold_italic') format('svg');
        font-weight: normal;
        font-style: normal;

    }


</style>
<script>
    $(document).ready(function() {

        $(".col2.viberi_me").hover(function() {
            $(".col2").css("background","url('/bitrix/templates/webkmv_main/images/table_bg_me.png')");
        })
        $(".col2.viberi_me").mouseleave(function() {
            $(".col2").css({"background":""})
        })
        $(".col3.viberi_me").hover(function() {
            $(".col3").css("background","url('/bitrix/templates/webkmv_main/images/table_bg_me.png')")
        })
        $(".col3.viberi_me").mouseleave(function() {
            $(".col3").css({"background":""})
        })
        $(".col4.viberi_me").hover(function() {
            $(".col4").css("background","url('/bitrix/templates/webkmv_main/images/table_bg_me.png')")
        })
        $(".col4.viberi_me").mouseleave(function() {
            $(".col4").css({"background":""})
        })
        $(".col5.viberi_me").hover(function() {
            $(".col5").css("background","url('/bitrix/templates/webkmv_main/images/table_bg_me.png')")
        })
        $(".col5.viberi_me").mouseleave(function() {
            $(".col5").css({"background":""})
        })
        $(".col6.viberi_me").hover(function() {
            $(".col6").css("background","url('/bitrix/templates/webkmv_main/images/table_bg_me.png')")
        })
        $(".col6.viberi_me").mouseleave(function() {
            $(".col6").css({"background":""})
        })
        $("td").on({
            mouseenter:function() {
                window.tt = $("."+$(this));
                $("."+$(this).attr("class")).addClass("high-td");
            },
            mouseleave: function() {

                //tt.remove();
            }
        });
        $(".list-service-menus li").click(function(e){
            e.preventDefault();
        })
        $(".list-service-menus li").hover(function() {
            if($(this).attr("data-t") != '') {

                $( ".list-service-active-img").css({
                    left:$(this).attr("data-me")+"px"
                });
                $(".list-service-active .block-me-bl").hide();
                $(".list-service-active ."+ $(this).attr("data-t")).show();
            }
        });
    })
</script>