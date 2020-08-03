<?php
$news_array = getNews();
$feedback_bool = true;
if($_POST && !(isset($_SESSION['feedback']))) {
    $_SESSION['feedback'] = 'Сообщение отправлено';
    if(inputFeedBack($_POST['feedback-author'],$_POST['email'],$_POST['phone'],$_POST['feedback-text'])) {
        $_SESSION['feedback'] = 'Сообщение отправлено';
        $to = $_POST['email'];
        $subject = "CompanySmoke";
        $message = 'От кого:'.$_POST['feedback-author'].' <br> Email:'.$_POST['email'].'<br>Телефон:'.$_POST['phone'].'<br>Сообщение:'.$_POST['feedback-text'];
        $headers = "Content-type: text/html; charset=windows-1251 \r\n";
        mail($to, $subject, $message, $headers);
    }; 
}
if(isset($_SESSION['feedback'])) $feedback_bool = false;
function inputFeedBack($name, $email, $phone = NULL, $text) {
    global $connection;
    $query = "INSERT INTO Feedback VALUES (default, '$name', '$email', '$phone', '$text')";
    echo($query);
    $result = mysqli_query($connection, $query);
    return $result;
}
include('application/views/contacts.php');
?>