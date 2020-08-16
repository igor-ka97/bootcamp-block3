<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$menu = extensionMenu($menu, 'Каталог', $categories);

if(empty($errors)) {
    if($_POST && !(isset($_SESSION['feedback']))) {
        if(inputFeedBack($author,$email,$phone,$feedback_text)) {
            $_SESSION['feedback'] = 'Сообщение отправлено';
            $to = $email;
            $subject = "CompanySmoke";
            $message = 'От кого:'.$author.' <br> Email:'.$email.'<br>Телефон:'.$phone.'<br>Сообщение:'.$feedback_text;
            $headers = "Content-type: text/html; charset=windows-1251 \r\n";
            mail($to, $subject, $message, $headers);
        } else {
            $msg_box = "";
            $msg_box = '<p class="error-message">Сообщнение не было отправлено. Попробуйте еще раз</p>';
            echo $msg_box;
        }
    }
} else {
    $msg_box = "";
    foreach($errors as $one_error){
        $msg_box .= '<p class="error-message">'.$one_error.'</p>';
    }
    echo $msg_box;
}

function inputFeedBack($name, $email, $phone = NULL, $text) {
    global $connection;
    $query = "INSERT INTO Feedback VALUES (default, '$name', '$email', '$phone', '$text')";
    $result = mysqli_query($connection, $query);
    return $result;
}

include('application/views/contacts.php');
?>
