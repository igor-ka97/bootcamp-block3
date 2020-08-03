<?php
    include_once("includes/lib.php");
    include_once("includes/config.php");
    $news_id = (isset($_GET['id'])) ? $_GET['id'] : null;
    if($news_id) {
        if(settype($news_id, "integer")) {
            $current_param['news_id'] = $news_id;
        } else header('location: 404.php');
    } else header('location: 404.php');
    include('application/models/news-detail.php');
?>