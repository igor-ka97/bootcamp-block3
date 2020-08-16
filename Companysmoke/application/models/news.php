<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$menu = extensionMenu($menu, 'Каталог', $categories);
$query = "SELECT COUNT(*) AS count FROM News";
$result = mysqli_query($connection, $query);
$result =  mysqli_fetch_assoc($result);
$count_pages = ceil($result['count']/PAGENEWSCOUNT);
if($page < 1) $page = 1;
if(!$count_pages) $count_pages = 1;
if($page > $count_pages) $page = $count_pages;
$pagination = pagination($page, $count_pages, );
$art = ($page * PAGENEWSCOUNT) - PAGENEWSCOUNT;
$query = "SELECT news_id, title, date, preview FROM News ORDER BY date DESC LIMIT $art,".PAGENEWSCOUNT;
$result = mysqli_query($connection, $query);
$all_news = array();
while($news = mysqli_fetch_assoc($result)){
    $all_news[] = $news;
}
$breadcrumbs = array();
$breadcrumbs['Главная'] = '/';
$breadcrumbs['Новости'] = null;
include('application/views/news.php');
?>