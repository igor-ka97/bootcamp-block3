<?php

include_once("includes/lib.php");
include_once("includes/config.php");

function inputFeedBack($name, $email, $phone = NULL, $text) {
    $connection = getConnection();
    $query = "INSERT INTO Feedback VALUES (default, '$name', '$email', '$phone', '$text')";
    echo($query);
    $result = mysqli_query($connection, $query);
    return $result;
}
?>