<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

$moduleId = 'redsign.prokids';

// check module include
if (!Loader::includeModule($moduleId)) {
	ShowError(Loc::getMessage('RSGOPRO.ERROR_NOT_INSTALLED_GOPRO'));
	die();
}

if (!\Bitrix\Main\Loader::includeModule('redsign.devfunc')) {
    ShowError(Loc::getMessage('RSGOPRO.ERROR_NOT_INSTALLED_DEVFUNC'));
    die();
} else {
    RSDevFunc::Init(array('jsfunc'));
}

// is main page
$isMain = 'N';
if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php')
	$isMain = 'Y';

// is catalog page
$isCatalog = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'catalog/') === false)
	$isCatalog = 'N';

// is personal page
$isPersonal = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'personal/') === false)
	$isPersonal = 'N';

// is auth page
$isAuth = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'auth/') === false)
	$isAuth = 'N';

// is ajax hit
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && isset($_SERVER['HTTP_X_FANCYBOX']) || isset($_REQUEST['AJAX_CALL']) && 'Y' == $_REQUEST['AJAX_CALL'];

CJSCore::Init('ajax');
$adaptive = COption::GetOptionString($moduleId, 'adaptive', 'Y');
$circular = COption::GetOptionString($moduleId, 'circular', 'Y');
$skuView = COption::GetOptionString($moduleId, 'skuView', 'line_through');
$phoneMask = COption::GetOptionString($moduleId, 'phone_mask', '+7 (999) 999-9999');

$asset = Asset::getInstance();

// add strings
$asset->addString('<link href="'.SITE_DIR.'favicon.ico" rel="shortcut icon"  type="image/x-icon">');
$asset->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />');
$asset->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
$asset->addString('<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>');
$asset->addString('<script src="//yastatic.net/share2/share.js" async="async" charset="utf-8"></script>');

// add styles
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/css/style.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/lib/fancybox/jquery.fancybox.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/lib/owl/owl.carousel.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/lib/jscrollpane/jquery.jscrollpane.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/js/glass/style.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/js/popup/style.css');

// add scripts (lib)
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery-1.11.2.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.mousewheel.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.cookie.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.maskedinput.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/owl/owl.carousel.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jscrollpane/jquery.jscrollpane.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.core.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.utils.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.slider.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/fancybox/jquery.fancybox.pack.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/scrollto/jquery.scrollTo.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/smoothscroll/SmoothScroll.js');

// add scripts (our)
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/popup/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/jscrollpane.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/glass/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/offers.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/timer.js');

// add custom
$asset->addCss(SITE_TEMPLATE_PATH.'/custom/style.css');
$asset->addJs(SITE_TEMPLATE_PATH.'/custom/script.js');

?><!DOCTYPE html>
<html>
<head>
	<title><?php $APPLICATION->ShowTitle(); ?></title>
	<script type="text/javascript">
	// some JS params
	var BX_COOKIE_PREFIX = 'BITRIX_SM_',
		SITE_ID = '<?=SITE_ID?>',
		SITE_DIR = '<?=str_replace('//', '/', SITE_DIR);?>',
		SITE_TEMPLATE_PATH = '<?=str_replace('//', '/', SITE_TEMPLATE_PATH);?>',
		SITE_CATALOG_PATH = 'catalog',
		RSGoPro_Adaptive = <?=($adaptive == 'Y' ? 'true' : 'false')?>,
		RSGoPro_FancyCloseDelay = 1000,
		RSGoPro_FancyReloadPageAfterClose = false,
		RSGoPro_OFFERS = {},
		RSGoPro_FAVORITE = {},
		RSGoPro_COMPARE = {},
		RSGoPro_INBASKET = {},
		RSGoPro_STOCK = {},
		RSGoPro_PHONETABLET = "N",
        RSGoPro_PhoneMask = '<?=$phoneMask?>';
	</script>
    <?php $APPLICATION->ShowHead(); ?>
    <script type="text/javascript">
    BX.message({
		"RSGOPRO_JS_TO_MACH_CLICK_LIKES": "<?=CUtil::JSEscape(GetMessage('RSGOPRO.JS_TO_MACH_CLICK_LIKES'))?>",
		"RSGOPRO_JS_COMPARE": "<?=CUtil::JSEscape(GetMessage('RSGOPRO.RSGOPRO_JS_COMPARE'))?>",
		"RSGOPRO_JS_COMPARE_IN": "<?=CUtil::JSEscape(GetMessage('RSGOPRO.RSGOPRO_JS_COMPARE_IN'))?>",
		"RSGOPRO_IN_STOCK_ISSET": "<?=CUtil::JSEscape(GetMessage('RSGOPRO.IN_STOCK_ISSET'))?>"
	});
    </script>
    <?$APPLICATION->IncludeFile(
        SITE_DIR."include/header/head_end.php",
        Array(),
        Array("MODE"=>"html")
    );?>
</head>
<body class="prop_option_<?=$skuView?><?php if ($adaptive == 'Y'): ?> adaptive<?php endif; ?><?php if ($circular == 'Y'): ?> circular<?php endif; ?>">

    <?$APPLICATION->IncludeFile(
        SITE_DIR."include/header/body_start.php",
        Array(),
        Array("MODE"=>"html")
    );?>
    
	<div id="panel"><?=$APPLICATION->ShowPanel()?></div>
    
    <div id="svg-icons" style="display: none;"></div>
    
	<div class="body"><!-- body -->
		<div class="tline"></div>
		<div id="tpanel" class="tpanel">
			<div class="centering">
				<div class="centeringin clearfix">
					<div class="authandlocation nowrap">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/location.php",
							Array(),
							Array("MODE"=>"html")
						);?>
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/auth.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/topline_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
			</div>
		</div>
		<div id="header" class="header">
			<div class="centering" style="min-height: 135px;">
				<div class="centeringin clearfix">
					<div class="logo column1">
						<div class="column1inner">
							<a href="<?=SITE_DIR?>">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/company_logo.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</a>
						</div>
					</div>
					<div class="phone column1 nowrap">
						<div class="column1inner">
							<i class="icon pngicons mobile_hide"></i>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/phone.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
					<div class="callback column1 nowrap">
						<div class="column1inner">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/nasvyazi.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
					<div class="favorite column1 nowrap">
						<div class="column1inner">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/favorite.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
					<div class="basket column1 nowrap">
						<div class="column1inner">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/basket_small.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
				</div>
			</div>
			<div class="centering">
				<div class="centeringin clearfix">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/search_title.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
			</div>
		</div>
		<?php if ($isMain == 'N'): ?>
			<div id="title" class="title">
				<div class="centering">
					<div class="centeringin clearfix">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/breadcrumb.php",
							Array(),
							Array("MODE"=>"html")
						);?>
						<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1>
					</div>
				</div>
			</div><!-- /title -->
		<?php endif; ?>
		<div id="content" class="content">
			<div class="centering">
				<div class="centeringin clearfix">

<?php
if ($isAjax) {
	$APPLICATION->RestartBuffer();
}
