<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
include('application/views/index.php');
?>