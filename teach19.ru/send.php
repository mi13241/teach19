<?php
$fio = $_POST['fio'];
$email = $_POST['email'];
$massage = $_POST['massage'];
$fio = htmlspecialchars($fio);
$email = htmlspecialchars($email);
$massage = htmlspecialchars($massage);
$fio = urldecode($fio);
$email = urldecode($email);
$massage = urldecode($massage);
$fio = trim($fio);
$email = trim($email);
$massage = trim($massage);
//echo $fio;
//echo "<br>";
//echo $email;
if (mail("aleks_merser.ru@mail.ru", "Заявка с сайта", "ФИО:".$fio.". E-mail: ".$email. "Сообщение: " .$massage,"From: d1z0n.onelove@gmail.com \r\n"))
 {     $new_url = 'https://teach19.ru/obr.php';
header('Location: '.$new_url);
} else {
    echo "при отправке сообщения возникли ошибки";
}?>