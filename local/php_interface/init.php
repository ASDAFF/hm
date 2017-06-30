<?php

// Константы
require('const.php');

// Функции
require('functions.php');

// Библиотеки композера
//require(dirname(__FILE__) . '/../vendor/autoload.php');

defined('DS') or define('DS', DIRECTORY_SEPARATOR);
require_once realpath(__DIR__ . DS . '..' . DS . 'modules' . DS . 'WM') . DS . 'autoloader.php';

// Обработчики событий
\WM\Handlers::addEventHandlers();

// Модули битрикса
\Bitrix\Main\Loader::IncludeModule('iblock');


