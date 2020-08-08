<?php
$news_array = getNews();
$categories = getCategories();
$query = "SELECT * FROM News WHERE news_id = ".$current_param['news_id'];
$news = mysqli_query($connection, $query);
$news =  mysqli_fetch_assoc($news);
if(!$news) header("location: 404.php");
$breadcrumbs = array();
$breadcrumbs['Главная'] = '/';
$breadcrumbs['Новости'] = 'news.php';
include('application/views/news-detail.php');
?>