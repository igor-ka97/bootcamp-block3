<?php   
    session_start();
    if($_POST) {
        $author = trim($_POST["feedback-author"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $feedback_text = trim($_POST["feedback-text"]);

        if($author == "") {
            $errors[] = "Поле «Имя» должно быть заполнено";
        }
        if($email == "") {
            $errors[] = "Поле «Электронная почта» должно быть заполнено";
        }
        if($phone == "") {
            $errors[] = "Поле с текстом обращения должно быть заполнено!";
        }
    }

    include('application/models/contacts.php');
?>