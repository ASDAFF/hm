<?
switch ($_SERVER['REQUEST_URI']) {
    case '/raboty':
        $raboty =  "class='active'";
        break;
    case '/raboty/molzavod':
        $raboty =  "class='active'";
        break;
    case '/raboty/tree':
        $raboty =  "class='active'";
        break;
    case '/rabody/yuvelirnyiy_dom_boje':
        $raboty =  "class='active'";
        break;
    case '/raboty/sushi_strike':
        $raboty =  "class='active'";
        break;
    case '/raboty/platnaya':
        $raboty =  "class='active'";
        break;
    case '/raboty/kazahstan':
        $raboty =  "class='active'";
        break;
    case '/raboty/lira':
        $raboty =  "class='active'";
        break;
    case '/raboty/userezhi':
        $raboty =  "class='active'";
        break;
    case '/raboty/klinika-zdoroviya':
        $raboty =  "class='active'";
        break;
    case '/raboty/gipsel':
        $raboty =  "class='active'";
        break;
    case '/rabody/internet-magazin_adonis':
        $raboty =  "class='active'";
        break;
    case '/raboty/panafics':
        $raboty =  "class='active'";
        break;
    case '/raboty/mocck':
        $raboty =  "class='active'";
        break;
    case '/raboty/ptic-zavod':
        $raboty =  "class='active'";
        break;
    case '/raboty/zdorovie':
        $raboty =  "class='active'";
        break;
    case '/raboty/molzavod':
        $raboty =  "class='active'";
        break;
    case '/raboty/vegastroi':
        $raboty =  "class='active'";
        break;
    default:
        $raboty = '';
        break;
}
?>
<header class="header">
    <div class="inner-block head-top">
        <a class="logo" title="На главную страницу" href="/"></a>
        <?$APPLICATION->IncludeComponent("bitrix:menu", "menuTop", Array(
            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                "MAX_LEVEL" => "2",	// Уровень вложенности меню
                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            ),
            false
        );?>
        <div class="phone-block">
            <a class="all-contacts" href="/kontaktyi">Все контакты</a>
            <span class="phone">8(8793) <span>40-72-90</span></span>
        </div>
    </div>

    <div class="wpmenuMe">
        <div class="submenuMe">
            <ul id="oneOpen">
                <li>
                    <a href="/sozdanie_saitov/corporate">Корпоративный сайт</a>
                </li>
                <li>
                    <a href="/sozdanie_saitov/internetmagazin">Интернет-магазин</a>
                </li>
                <li>
                    <a href="/sozdanie_saitov/landing">Landing-page</a>
                </li>
                <li>
                    <a href="/sozdanie_saitov/visitka">Сайт-визитка</a>
                </li>
                <li>
                    <a href="/sozdanie_saitov/vitrina">Сайт-витрина</a>
                </li>
                <li>
                    <a href="/sozdanie_saitov/bistrosait">Быстросайт</a>
                </li>
                <!--<li>
                    <a href="/arenda">Сайт в аренду</a>
                </li>-->
                <div class="clear"></div>
            </ul>
            <!--                <ul id="twoOpen">
                                <li>
                                    <a href="#">Корпоративный сайт 2</a>
                                </li>
                                <li>
                                    <a href="#">Интернет-магазин 2</a>
                                </li>
                                <li>
                                    <a href="#">Landing-page</a>
                                </li>
                                <li>
                                    <a href="#">Сайт-визитка</a>
                                </li>
                                <li>
                                    <a href="#">Каталог товаров</a>
                                </li>
                                <li>
                                    <a href="#">Быстросайт</a>
                                </li>
                                <li>
                                    <a href="#">Сайт в аренду</a>
                                </li>
                                <div class="clear"></div>
                            </ul>-->
        </div>
    </div>
    <? if ($APPLICATION->GetCurPage(false) === '/'): ?>
        <div class="banner-block">
        <div class="inner-block inn-banner">
            <div class="inner-spans">
                <span>Сайты</span>
                <span>Мобильные приложения</span>
                <span>создание фирменного стиля</span>
                <span>проектирование интерфейсов</span>
                <span>сопровождение</span>
                <span>продвижение</span>
            </div>
            <a href="#email-us" class="btn"><span>стать клиентом</span></a>
            <img alt="" src="/bitrix/templates/webkmv_main/images/yandex.png" class="yandex-ic">
            <div class="orden">
                <img src="/bitrix/templates/webkmv_main/images/skfo_II.PNG" alt=""/>
            </div>

            <a target="_blank" href="http://www.advertising.yandex.ru/contact/agency/partner.xml?url=www.web-kmv.ru">
                <img width="155" height="167" border="0" alt="Сертифицированное агентство" src="http://avatars.yandex.net/get-dps/ebfebd3057661ee3ecf3c992135ef22e/normal" class="yandex-i2c">
            </a>
            <!--<a href="http://advertising.yandex.ru/contact/agency/partner.xml?url=www.web-kmv.ru">
            <img class="yandex-i2c" src="images/yanddir.png" alt="">
        </a>-->
        </div>
    </div>
    <?endif;?>
    <div class="servicesb-block homeny">
        <div class="inner-serv-block">
            <span class="head-ic"></span>
            <ul class="servicesb">
                <li class="serv1"><a href="javascript: void(0);">Четкие сроки, прозрачное ценообразование</a></li>
                <li class="serv2"><a href="javascript: void(0);">Стильный, продающий дизайн</a></li>
                <li class="serv3"><a href="javascript: void(0);">Кроссбраузерная и адаптивная верстка</a></li>
                <li class="serv4"><a href="javascript: void(0);">Надежное программное обеспечение</a></li>
                <li class="serv5"><a href="javascript: void(0);">Техническая поддержка <br/>и продвижение</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</header><!-- .header-->

<div class="siteList" style="display: none;">
    <ul>
        <li class="si-1 si">
            <a href="/corporate">Корпоративный сайт</a>
        </li>
        <li class="si-2 si">
            <a href="/internetmagazin">Интернет-магазин</a>
        </li>
        <li class="si-3 si">
            <a href="/landing">Landing Page</a>
        </li>
        <li class="si-4 si">
            <a href="/visitka">Сайт-визитка</a>
        </li>
        <li class="si-5 si">
            <a href="#">Каталог товаров</a>
        </li>
        <li class="si-6 si">
            <a href="/bistrosait">Быстро-сайт</a>
        </li>
        <li class="si-7 si">
            <a href="/arenda">Сайт в аренду</a>
        </li>
        <div class="clear"></div>
    </ul>
</div>