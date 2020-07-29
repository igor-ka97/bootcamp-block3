<?php
include('application/models/product.php');
if (isset($_GET['id'])) {
    $id_product = $_GET['id'];
    if (existsProduct( $id_product)) {
        if (isset($_GET['cat_id'])) {
            $id_category = $_GET['cat_id'];
            if (!(existsCategory($id_category) && existsProductCategory($id_product,$id_category))) header("location: 404.php");
        }
        $product = getProduct($id_product);
    } else header("location: 404.php");
    existsProductCategory(1,2);
} else header("location: 404.php");
include('application/views/product.php');
?>