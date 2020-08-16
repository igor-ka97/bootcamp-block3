<?php
include_once("includes/lib.php");
include_once("includes/config.php");
$news_array = getNews();
$categories = getCategories();
$menu = extensionMenu($menu, 'Каталог', $categories);
$query_product = "SELECT p.name, p.price, p.description, p.category_id, p.product_img FROM Product p WHERE product_id = ".$correct_param['id'];
if (!array_key_exists('cat_id', $correct_param)) {
    $product = mysqli_query($connection, $query_product);
    $product =  mysqli_fetch_assoc($product);
    if(empty($product)) return404();
} else {
    $query_cat = "SELECT p.name, p.price, p.description, p.category_id, p.product_img from Product p JOIN ProductCategory pc on p.product_id = pc.product_id WHERE pc.product_id =".$correct_param['id']." AND pc.category_id =".$correct_param['cat_id'];
    $query = "SELECT name, price, description, category_id, product_img FROM($query_product UNION $query_cat) AS exists_pc";
    $product = mysqli_query($connection, $query);
    $product =  mysqli_fetch_assoc($product);
    if(empty($product)) return404();
}

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