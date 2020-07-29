<?php
include_once("includes/lib.php");
include_once("includes/config.php");

function getAllNews($page) {
    $art = ($page * PAGENEWSCOUNT) - PAGENEWSCOUNT;
    $connection = getConnection();
    $query = "SELECT news_id, title, date, preview FROM News ORDER BY date LIMIT $art,".PAGENEWSCOUNT;
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[] = $element;
    }
    return $array;
}

function getCountPage() {
    $connection = getConnection();
    $query = "SELECT COUNT(*) AS count FROM News";
    $result = mysqli_query($connection, $query);
    $result =  mysqli_fetch_assoc($result);
    echo(ceil($result['count']/PAGENEWSCOUNT));
    return ceil($result['count']/PAGENEWSCOUNT);
}

?>