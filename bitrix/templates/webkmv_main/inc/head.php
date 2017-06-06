
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/x-icon" href="/bitrix/templates/webkmv_main/favicon.ico" />



    <title><?$APPLICATION->ShowTitle()?></title>



    <link rel="shortcut icon" href="/bitrix/templates/webkmv_main//bitrix/templates/webkmv_main/images/webmaster_favicon.png" type="image/png">
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic&subset=cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="/bitrix/templates/webkmv_main/js/uploadify/uploadify.css" rel="stylesheet">
    <link href="/bitrix/templates/webkmv_main/style/jquery.fancybox.css" rel="stylesheet">
    <link href="/bitrix/templates/webkmv_main/style/style.css" rel="stylesheet">
    <link href="/bitrix/templates/webkmv_main/style/owl.carousel.css" rel="stylesheet">
    <link href="/bitrix/templates/webkmv_main/style/owl.transitions.css" rel="stylesheet">
    <link rel="/bitrix/templates/webkmv_main/stylesheet" href="upload/css/jquery.fileupload.css">
    <link href="/bitrix/templates/webkmv_main/style/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <script src="/bitrix/templates/webkmv_main/js/jquery-1.9.1.min.js"></script>
    <script src="/bitrix/templates/webkmv_main/js/owl.carousel.js"></script>
    <script src="/bitrix/templates/webkmv_main/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <script src="/bitrix/templates/webkmv_main/js/jquery.cycle.all.js" type="text/javascript"></script>
    <script src="/bitrix/templates/webkmv_main/js/jquery.fancybox.js" type="text/javascript"></script>
    <script type="text/javascript" src="/bitrix/templates/webkmv_main/js/jquery.jshowoff.js"></script>
    <!--<script type="text/javascript" src="/bitrix/templates/webkmv_main/js/jquery.fancybox-1.2.1.pack.js"></script>-->
    <style>
    /*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
    .fancybox-wrap,
    .fancybox-skin,
    .fancybox-outer,
    .fancybox-inner,
    .fancybox-image,
    .fancybox-wrap iframe,
    .fancybox-wrap object,
    .fancybox-nav,
    .fancybox-nav span,
    .fancybox-tmp
    {
        padding: 0;
        margin: 0;
        border: 0;
        outline: none;
        vertical-align: top;
    }

    .fancybox-wrap {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 8020;
    }

    .fancybox-skin {
        position: relative;
        background: #f9f9f9;
        color: #444;
        text-shadow: none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .fancybox-opened {
        z-index: 8030;
    }

    .fancybox-opened .fancybox-skin {
        -webkit-box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    .fancybox-outer, .fancybox-inner {
        position: relative;
    }

    .fancybox-inner {
        overflow: hidden;
    }

    .fancybox-type-iframe .fancybox-inner {
        -webkit-overflow-scrolling: touch;
    }

    .fancybox-error {
        color: #444;
        font: 14px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;
        margin: 0;
        padding: 15px;
        white-space: nowrap;
    }

    .fancybox-image, .fancybox-iframe {
        display: block;
        width: 100%;
        height: 100%;
    }

    .fancybox-image {
        max-width: 100%;
        max-height: 100%;
    }

    #fancybox-loading, .fancybox-close, .fancybox-prev span, .fancybox-next span {
        background-image: url('fancybox_sprite.png');
    }

    #fancybox-loading {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -22px;
        margin-left: -22px;
        background-position: 0 -108px;
        opacity: 0.8;
        cursor: pointer;
        z-index: 8060;
    }

    #fancybox-loading div {
        width: 44px;
        height: 44px;
        background: url('fancybox_loading.gif') center center no-repeat;
    }

    .fancybox-close {
        position: absolute;
        top: -18px;
        right: -18px;
        width: 36px;
        height: 36px;
        cursor: pointer;
        z-index: 8040;
    }

    .fancybox-nav {
        position: absolute;
        top: 0;
        width: 40%;
        height: 100%;
        cursor: pointer;
        text-decoration: none;
        background: transparent url('blank.gif'); /* helps IE */
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        z-index: 8040;
    }

    .fancybox-prev {
        left: 0;
    }

    .fancybox-next {
        right: 0;
    }

    .fancybox-nav span {
        position: absolute;
        top: 50%;
        width: 36px;
        height: 34px;
        margin-top: -18px;
        cursor: pointer;
        z-index: 8040;
        visibility: hidden;
    }

    .fancybox-prev span {
        left: 10px;
        background-position: 0 -36px;
    }

    .fancybox-next span {
        right: 10px;
        background-position: 0 -72px;
    }

    .fancybox-nav:hover span {
        visibility: visible;
    }

    .fancybox-tmp {
        position: absolute;
        top: -99999px;
        left: -99999px;
        visibility: hidden;
        max-width: 99999px;
        max-height: 99999px;
        overflow: visible !important;
    }

    /* Overlay helper */

    .fancybox-lock {
        overflow: hidden !important;
        width: auto;
    }

    .fancybox-lock body {
        overflow: hidden !important;
    }

    .fancybox-lock-test {
        overflow-y: hidden !important;
    }

    .fancybox-overlay {
        position: absolute;
        top: 0;
        left: 0;
        overflow: hidden;
        display: none;
        z-index: 8010;
        background: url('fancybox_overlay.png');
    }

    .fancybox-overlay-fixed {
        position: fixed;
        bottom: 0;
        right: 0;
    }

    .fancybox-lock .fancybox-overlay {
        overflow: auto;
        overflow-y: scroll;
    }

    /* Title helper */

    .fancybox-title {
        visibility: hidden;
        font: normal 13px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;
        position: relative;
        text-shadow: none;
        z-index: 8050;
    }

    .fancybox-opened .fancybox-title {
        visibility: visible;
    }

    .fancybox-title-float-wrap {
        position: absolute;
        bottom: 0;
        right: 50%;
        margin-bottom: -35px;
        z-index: 8050;
        text-align: center;
    }

    .fancybox-title-float-wrap .child {
        display: inline-block;
        margin-right: -100%;
        padding: 2px 20px;
        background: transparent; /* Fallback for web browsers that doesn't support RGBa */
        background: rgba(0, 0, 0, 0.8);
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        text-shadow: 0 1px 2px #222;
        color: #FFF;
        font-weight: bold;
        line-height: 24px;
        white-space: nowrap;
    }

    .fancybox-title-outside-wrap {
        position: relative;
        margin-top: 10px;
        color: #fff;
    }

    .fancybox-title-inside-wrap {
        padding-top: 10px;
    }

    .fancybox-title-over-wrap {
        position: absolute;
        bottom: 0;
        left: 0;
        color: #fff;
        padding: 10px;
        background: #000;
        background: rgba(0, 0, 0, .8);
    }

    /*Retina graphics!*/
    @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
    only screen and (min--moz-device-pixel-ratio: 1.5),
    only screen and (min-device-pixel-ratio: 1.5){

        #fancybox-loading, .fancybox-close, .fancybox-prev span, .fancybox-next span {
            background-image: url('fancybox_sprite@2x.png');
            background-size: 44px 152px; /*The size of the normal image, half the size of the hi-res image*/
        }

        #fancybox-loading div {
            background-image: url('fancybox_loading@2x.gif');
            background-size: 24px 24px; /*The size of the normal image, half the size of the hi-res image*/
        }
    }
    </style>
    <!--Страница отзывы-->
    <!--End Страница отзывы-->
    <script src="/bitrix/templates/webkmv_main/js/main.js"></script>


    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/bitrix/templates/webkmv_main/upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Load Image plugin is included for the preview /bitrix/templates/webkmv_main/images and image resizing functionality -->
    <!--<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>-->
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/bitrix/templates/webkmv_main/upload/js/jquery.fileupload-validate.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-17412358-16', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25799501 = new Ya.Metrika({id:25799501,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <!-- /Yandex.Metrika counter -->

    <!-- Stat.MegaIndex.ru Start -->
    <script type="text/javascript">var mi=document.createElement('script');mi.type='text/javascript';mi.async=true;mi.src=(document.location.protocol=='https:'?'https':'http')+'://counter.megaindex.ru/core.js?t;'+escape(document.referrer)+((typeof(screen)=='undefined')?'':';'+screen.width+'*'+screen.height)+';'+escape(document.URL)+';'+document.title.substring(0,256)+';94884';document.getElementsByTagName('head')[0].appendChild(mi);</script>
    <!-- Stat.MegaIndex.ru End -->

    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
        (function(){ var widget_id = 'N6gzheMaPZ';
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
    <!-- {/literal} END JIVOSITE CODE -->
