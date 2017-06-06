
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>


    <?$APPLICATION->ShowHead();?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title><?$APPLICATION->ShowTitle()?></title>


    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
    <![endif]-->

    <!-- **Favicon** -->
    <link href="/bitrix/templates/webkmv_new/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- **CSS - stylesheets** -->
    <link id="default-css" href="/bitrix/templates/webkmv_new/style.css" rel="stylesheet" media="all" />
    <link href="/bitrix/templates/webkmv_new/css/animations.css" rel="stylesheet" media="all" />
    <link id="shortcodes-css" href="/bitrix/templates/webkmv_new/css/shortcodes.css" rel="stylesheet"  type="text/css" />
    <link href="/bitrix/templates/webkmv_new/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="/bitrix/templates/webkmv_new/css/meanmenu.css" rel="stylesheet" type="text/css" media="all" />

    <link href="/bitrix/templates/webkmv_new/css/settings.css" rel="stylesheet" media="all" />

    <link href="/bitrix/templates/webkmv_new/css/isotope.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/bitrix/templates/webkmv_new/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />

    <link href="/bitrix/templates/webkmv_new/css/funnyText.css" rel="stylesheet" type="text/css" />

    <!-- **Skin - stylesheets** -->
    <link id="skin-css" href="/bitrix/templates/webkmv_new/skins/orange/style.css" rel="stylesheet" media="all" />

    <!-- **Font Awesome** -->
    <link href="/bitrix/templates/webkmv_new/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/bitrix/templates/webkmv_new/js/layerslider/css/layerslider.css" type="text/css">

    <!--[if IE 7]>
    <link rel="stylesheet" href="/bitrix/templates/webkmv_new/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- **jQuery** -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script>
        !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
    </script>
    <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="/owl-carousel/owl.carousel.css">
    <!-- Default Theme -->
    <link rel="stylesheet" href="/owl-carousel/owl.theme.css">
    <!--  jQuery 1.7+  -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Include js plugin -->
    <script src="/owl-carousel/owl.carousel.js"></script>


    <script type="text/javascript">
        var __cs = __cs || [];
        __cs.push(["setAccount", "B9NFgx8hILPqm5O4wB7nvl4QF0Q7TXht"]);
        __cs.push(["setHost", "//server.comagic.ru/comagic"]);
    </script>
    <script type="text/javascript" async src="//app.comagic.ru/static/cs.min.js"></script>
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TKDSNQ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TKDSNQ');</script>
<!-- End Google Tag Manager -->
<?$APPLICATION->ShowPanel();?>


<div id="preloader"> <h1>идет загрузка  </h1> </div>
<div class="wrapper">
<div class="inner-wrapper">
<!-- Header Starts here -->
    
<header id="header" class="type1 dt-sticky-menu">
        <div class="container">
            <div id="logo">
                <a href="/"> <img src="/bitrix/templates/webkmv_new/images/logo.png" alt="" title=""> </a>
            </div>
              <div class="float-right phone-header"><span style='color:  #f9451b'>8 (962) </span> 028-36-87</div>
            <div id="menu-container" class="float-right">
                <nav id="main-menu">
                    <ul class="group">
                        <li  class="menu-item <?if($_SERVER['REQUEST_URI'] == '/index.php'):?>current_page_item<?endif;?>"><a class="external" href="/index.php">Главная</a></li>
                        <li class="menu-item <?if($_SERVER['REQUEST_URI'] == '/raboty/'):?>current_page_item<?endif;?>"><a class="external" href="/raboty/">Портфолио</a></li>
                        <li class="menu-item <?if($_SERVER['REQUEST_URI'] == '/kontaktyi/'):?>current_page_item<?endif;?>"><a class="external" href="/kontaktyi/">Контакты</a></li>
                         <!-- <li class="menu-item"><a href="shortcodes.html" class="external">Блог</a></li>-->
                    </ul>
                </nav>
            </div>

        </div>
    </header>

  

   


