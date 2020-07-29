<?php

include_once("includes/lib.php");
include_once("includes/config.php");

function existsProduct($id) {
    $connection = getConnection();
    $query = "SELECT EXISTS(SELECT product_id FROM Product WHERE product_id =".$id.") AS exists_product";
        $result = mysqli_query($connection, $query);
        $result =  mysqli_fetch_assoc($result);
        return $result['exists_product'];
}

function existsCategory($id) {
    $connection = getConnection();
    $query = "SELECT EXISTS(SELECT category_id FROM Category WHERE category_id =".$id.") AS exists_category";
        $result = mysqli_query($connection, $query);
        $result =  mysqli_fetch_assoc($result);
        return $result['exists_category'];
}

function existsProductCategory($id_product, $id_category) {
    $connection = getConnection();
    $query = "SELECT EXISTS(SELECT * FROM Product p JOIN ProductCategory pc ON p.product_id = pc.product_id WHERE p.product_id =".$id_product." AND (p.category_id=".$id_category." OR pc.category_id=".$id_category.")) AS exists_pc";
        $result = mysqli_query($connection, $query);
        $result =  mysqli_fetch_assoc($result);
        return $result['exists_pc'];
}

function getProduct($id) {
    $connection = getConnection();
    $query = "SELECT * FROM Product WHERE product_id = ".$id;
    $result = mysqli_query($connection, $query);
    $result =  mysqli_fetch_assoc($result);
    return $result;
}
?>