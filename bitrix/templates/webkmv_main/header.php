<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <?$APPLICATION->ShowHead();?>
    <?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/head.php";?>
</head>
<div title="окно" class="overlay"></div>

<? include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/tarif_popup.php";?>
<? if ($APPLICATION->GetCurPage(false) == '/podderjka_saitov/'): ?>

<? endif; ?>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<body class="bg-style <?if(ERROR_404 == 'Y'):?>class404<?endif;?>"
    <? if ($APPLICATION->GetCurPage(false) != '/'): ?>
        id="xbox-10"
    <? endif; ?>
      >
<?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/header.php";?>
<!--<div class="site-v-arendu"></div>-->
<div class="toTop">
    <a class="xbox-10" href="#xbox-10"></a>
</div>

<div class="wrapper bg-style2">


<main class="content">



