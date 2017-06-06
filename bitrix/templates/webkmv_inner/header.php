<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <?$APPLICATION->ShowHead();?>
    <?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/head.php";?>
</head>


<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<body class="bg-style" id="xbox-10">
<?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/header.php";?>
<!--<div class="site-v-arendu"></div>-->
<div class="toTop">
    <a class="xbox-10" href="#xbox-10"></a>
</div>

<div class="wrapper bg-style2">


    <main class="content con-blog">
        <div class="inner-block">
            <div class="sidebar">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "team_menu", Array(
	"ROOT_MENU_TYPE" => "menu_team",	// Тип меню для первого уровня
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	),
	false
);?>
            </div>
            <div class="cont-block">








