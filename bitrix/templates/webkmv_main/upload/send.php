<?
$t_message = $_GET['t_message'];
echo $t_message;
$t_link = $_GET['t_link'];

$t_host = $_SERVER['HTTP_HOST'];
$to  = "seo@web-kmv.ru" ;
$to2  = "webkmv26@gmail.com" ;
$to3  = "director@web-kmv.ru" ;
$subject = "Заявка на создание сайта";
$message = "
<html>
    <head>
        <title>Заявка на создание сайта</title>
    </head>
    <body>
        <p>$t_message</p>";
/*	
if($t_link) {
    $message .= "<p><b>Файл: </b> <a href='http://$t_host/upload/server/php/files/$t_link'>http://$t_host/upload/server/php/files/$t_link</a></p>";
}
*/
$message.= "
    </body>
</html>";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";
if(strlen($t_message) >= 50){
	mail($to, $subject, $message, $headers);
	mail($to2, $subject, $message, $headers);
	mail($to3, $subject, $message, $headers);
}
?>