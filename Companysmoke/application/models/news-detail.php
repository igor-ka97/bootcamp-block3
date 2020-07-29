<?php
include_once("includes/lib.php");
include_once("includes/config.php");

function getNew($id) {
    $connection = getConnection();
    $query = "SELECT * FROM News WHERE news_id = ".$id;
    $result = mysqli_query($connection, $query);
    $result =  mysqli_fetch_assoc($result);
    return $result;
}
?>