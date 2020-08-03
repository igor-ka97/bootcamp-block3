<?php
    include_once("includes/lib.php");
    include_once("includes/config.php");
    $id_product = (isset($_GET['id'])) ? $_GET['id'] : null;
    $id_category = (isset($_GET['cat_id'])) ? $_GET['cat_id'] : null;
    $correct_param = array();
    if ($id_product) {
        settype($id_product, "integer");
        $correct_param['id'] = $id_product;
        if ($id_category) {
            settype($id_category, "integer");
            $correct_param['cat_id'] = $id_category;
        }
    } else header("location: 404.php");
    include('application/models/product.php');
?>