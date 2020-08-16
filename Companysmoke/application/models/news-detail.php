<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$menu = extensionMenu($menu, 'Каталог', $categories);
$query = "SELECT * FROM News WHERE news_id = ".$current_param['news_id'];
$news = mysqli_query($connection, $query);
$news =  mysqli_fetch_assoc($news);
if(!$news) return404();
$breadcrumbs = array();
$breadcrumbs['Главная'] = '/';
$breadcrumbs['Новости'] = 'news.php';
include('application/views/news-detail.php');
?>