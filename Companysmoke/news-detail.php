<?php
    $news_id = (isset($_GET['id'])) ? $_GET['id'] : null;
    if($news_id) {
        if(settype($news_id, "integer")) {
            $current_param['news_id'] = $news_id;
        } else return404();
    } else return404();
    include('application/models/news-detail.php');
?>