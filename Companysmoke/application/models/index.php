<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$menu = extensionMenu($menu, 'Каталог', $categories);
include('application/views/index.php');
?>