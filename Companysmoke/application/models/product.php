<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$query = "SELECT EXISTS(SELECT product_id FROM Product WHERE product_id =".$correct_param['id'].") AS exists_product";
$exists_product = mysqli_query($connection, $query);
$exists_product =  mysqli_fetch_assoc($exists_product);
if(!$exists_product['exists_product']) header("location: 404.php");
if (array_key_exists('cat_id', $correct_param)) {
    $query = "SELECT EXISTS(SELECT category_id FROM Category WHERE category_id =".$correct_param['cat_id'].") AS exists_category";
    $exists_category = mysqli_query($connection, $query);
    $exists_category =  mysqli_fetch_assoc($exists_category);
    if(!$exists_category['exists_category']) header("location: 404.php");

    $query1 = "SELECT * FROM Product WHERE product_id=".$correct_param['id']." AND category_id = ".$correct_param['cat_id'];
    $query2 = "SELECT * from Product p JOIN ProductCategory pc on p.product_id = pc.product_id WHERE pc.product_id =".$correct_param['id']." AND pc.category_id =".$correct_param['cat_id'];
    $query = "SELECT EXISTS($query1 UNION $query2) AS exists_pc";
    $result = mysqli_query($connection, $query);
    $result =  mysqli_fetch_assoc($result);
    if(!$result['exists_pc']) header("location: 404.php");
}
$query = "SELECT * FROM Product WHERE product_id = ".$correct_param['id'];
$product = mysqli_query($connection, $query);
$product =  mysqli_fetch_assoc($product);
$breadcrumbs = array();
$breadcrumbs['Главная'] = '/';
$breadcrumbs['Каталог'] = 'catalog.php';
if (array_key_exists('cat_id', $correct_param)) {
    $name = $categories[$correct_param['cat_id']]['title'];
    $cat_id = $correct_param['cat_id'];
} else {
    $name = $categories[$product['category_id']]['title'];
    $cat_id = $product['category_id'];
}
$breadcrumbs[$name] = 'catalog.php?id='.$cat_id;
$breadcrumbs[$product['name']] = null;
include('application/views/product.php');
?>