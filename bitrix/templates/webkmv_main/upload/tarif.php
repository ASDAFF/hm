<?
$t_name = $_GET['name'];
$t_phone = $_GET['phone'];
$t_email = $_GET['email'];
$t_email = $_GET['email'];
$t_tarif = $_GET['tarif'];



$t_host = $_SERVER['HTTP_HOST'];
$to  = "seo@web-kmv.ru" ;
$to2  = "webkmv26@gmail.com" ;
$to3  = "director@web-kmv.ru" ;
$subject = "Выбор тарифного плана";
$message = "
<html>
    <head>
        <title>Выбор тарифного плана</title>
    </head>
    <body>
        <p>Имя: $t_name</p>
        <p>Телефон: $t_phone</p>
        <p>E-mail: $t_email</p>
        <p>Тариф: $t_tarif</p>";
/*
if($t_link) {
    $message .= "<p><b>Файл: </b> <a href='http://$t_host/upload/server/php/files/$t_link'>http://$t_host/upload/server/php/files/$t_link</a></p>";
}
*/
$message.= "
    </body>
</html>";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";

mail($to2, $subject, $message, $headers);
mail($to3, $subject, $message, $headers);
?>