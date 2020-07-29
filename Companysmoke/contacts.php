<?php
    //контроллер для списка товаров. проверяем корректность параметров и подключаем соответствующую модель
session_start();
include('application/models/contacts.php');
$feedback_bool = true;
if($_POST && !(isset($_SESSION['feedback']))) {
    $_SESSION['feedback'] = 'Сообщение отправлено';
    if(inputFeedBack($_POST['feedback-author'],$_POST['email'],$_POST['phone'],$_POST['feedback-text'])) {
        $_SESSION['feedback'] = 'Сообщение отправлено';
        $to = $_POST['email'];
        $subject = "CompanySmoke";
        $meesage = 'От кого:'.$_POST['feedback-author'].' <br> Email:'.$_POST['email'].'<br>Телефон:'.$_POST['phone'].'<br>Сообщение:'.$_POST['feedback-text'];
        $headers = "Content-type: text/html; charset=windows-1251 \r\n";
        mail($to, $subject, $message, $headers);
    }; 
}

if(isset($_SESSION['feedback'])) $feedback_bool = false;
include('application/views/contacts.php');
?>