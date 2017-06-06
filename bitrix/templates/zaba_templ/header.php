<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<?$APPLICATION->ShowHead();?>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/blocks.css" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/site.css" />

	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/fbox/jquery.fancybox.css" />

	<script type="text/javascript" language="javascript" src="<?=SITE_TEMPLATE_PATH?>/jscript/jquery-1.11.1.js"></script>

	<script type="text/javascript" language="javascript" src="<?=SITE_TEMPLATE_PATH?>/fbox/jquery.fancybox.js"></script>
	<script type="text/javascript" language="javascript" src="<?=SITE_TEMPLATE_PATH?>/fbox/jquery.fancybox.pack.js"></script>

	<script type="text/javascript" language="javascript" src="<?=SITE_TEMPLATE_PATH?>/jscript/me.js"></script>
	<script type="text/javascript" language="javascript" src="<?=SITE_TEMPLATE_PATH?>/jscript/emojify.js"></script>

	<?/*<script src="http://maps.api.2gis.ru/2.0/loader.js?pkg=basic&lazy=true" data-id="dgLoader"></script>*/?>

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/lightslider.css">
    <style>
        ul{
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }
        .demo .item{
            margin-bottom: 60px;
        }
        .content-slider li{
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }
        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }
        .demo{
            width: 800px;
        }
    </style>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/lightslider.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:6,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>



	<title><?$APPLICATION->ShowTitle()?></title>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NV3C3H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NV3C3H');</script>
<!-- End Google Tag Manager -->
<?$APPLICATION->ShowPanel();?>



<div class="content_width">
<div class="auth_tob">
	<?
	$APPLICATION->IncludeFile(
		SITE_DIR."include/auth_tob.php",
		Array(),
		Array("MODE"=>"html")
	);
	?>
</div>
<a href="/" class="main_logo">
	<img src="/include/logo.png">
	<?
	/*
	$APPLICATION->IncludeFile(
		SITE_DIR."include/company_name.php",
		Array(),
		Array("MODE"=>"html")
	);
	*/
	?>
</a>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>




