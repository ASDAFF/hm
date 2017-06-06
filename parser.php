<?php

@set_time_limit(0);
ignore_user_abort(true);

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('CHK_EVENT', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$STEP_SIZE = 50;

$dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser';

//$hobbart = new \WM\Parser\HobbartParser('http://hobbart.ru/yamarket.xml');
//$hobbart->loadDoc(empty($_GET['step']));


//$categories = $hobbart->getCategories();

$section = new \WM\Parser\IblockSection(39);

//$section->setCategories($categories);

if(!isset($_GET['AJAX']))
    $section->loadCategories();

//$products = $hobbart->getProducts($section->getExistsCategories()['xmlIds']);

$step = isset($_GET['step']) ? (int) $_GET['step'] : 1;

$element = new \WM\Parser\IblockElement(39);

if(!isset($_GET['AJAX']))
    echo 'Выгрузка Gamma<br>';

$gamma = new \WM\Parser\GammaParser('http://shop.firma-gamma.ru/api/v1.0/fullcatalog.php?type=yml&compression=zip', 'fullcatalog.yml.zip');

if(!isset($_GET['AJAX']))
    $gamma->loadDocWithAuth('webkmv', '03webkmv');

$section->setCategories($gamma->getCategories());

$cats = (array) $section->getExistsCategories();
$cats = $cats['xmlIds'];

$catsKeys = array_keys($cats);

$curCategoryIndex = isset($_GET['curCategoryIndex']) ? (int) $_GET['curCategoryIndex'] : 0;

if(empty($catsKeys[$curCategoryIndex]))
{
    echo 'end_cats';
    exit;
}
while(isset($catsKeys[$curCategoryIndex]) && !($products = $gamma->getProducts($cats, $catsKeys[$curCategoryIndex])))
{
    ++$curCategoryIndex;
}
if(empty($products))
{
    echo 'end_products';
    exit;
}
//var_dump($cats, $catsKeys[$curCategoryIndex], $products);exit;
$stepCount = (int) ceil(count($products) / $STEP_SIZE);

if($step > $stepCount)
{
    $step = 1;
    while(isset($catsKeys[++$curCategoryIndex]) && !($products = $gamma->getProducts($cats, $catsKeys[$curCategoryIndex])))
        ;
}
$element->setProducts($products);

//if(isset($_GET['AJAX']))
    $element->loadProducts($step, $STEP_SIZE, '/parser.php?AJAX=true&step=' . $step . '&curCategoryIndex=' . $curCategoryIndex);

?>
<div id="answer"></div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(function()
    {
        (function sendRequest(step, curCatIndex)
        {
            history.pushState(null, document.title, '/parser.php?AJAX=true&step=' + <?=$step?> + '&curCategoryIndex=' + curCatIndex);
            curCatIndex = curCatIndex || 0;
            if(step == 'end_cats')
            {
                $('#answer').append('<br><h3>Выгрузка категорий успешно завершена</h3>');
                return ;
            }
            if(step == 'end_products')
            {
                $('#answer').append('<br><h3>Выгрузка товаров успешно завершена</h3>');
                return ;
            }
            if(!!isNaN(step))
            {
                $('#answer').append('Fail!');
                return ;
            }
            $('#answer').append('Шаг ' + (step == undefined ? 1 : step) + ' из ' + <?=$stepCount?> + ' шагов...<br>');
            $.get('/parser.php?AJAX=true&step=' + step + '&curCategoryIndex=' + curCatIndex, {step: step, curCategoryIndex: curCatIndex}, function(ans) {
                if(!!isNaN(ans) && ans <= <?=$stepCount?>)
                    sendRequest(ans, curCatIndex);
                else
                    sendRequest(ans, curCatIndex + 1);
                //$('#answer').append('<br><h3>Выгрузка товаров успешно завершена</h3>');
            });
        })(<?=$step?>, <?=$curCategoryIndex?>);
    })
</script>