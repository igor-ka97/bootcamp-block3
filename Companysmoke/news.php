<?php
include('application/models/news.php');

$page = 1;
if(isset($_GET['page'])) {
    $page = (int)$_GET['page'];
    if( $page < 1 ) $page = 1;
}
$all_news = getAllNews($page);
$perpage = PAGENEWSCOUNT;
$count_pages = getCountPage();
if( !$count_pages ) $count_pages = 1;
if( $page > $count_pages ) $page = $count_pages;
$pagination = pagination($page, $count_pages);

include('application/views/news.php');
?>