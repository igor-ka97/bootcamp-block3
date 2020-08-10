<?php
    $id_product = (isset($_GET['id'])) ? $_GET['id'] : null;
    $id_category = (isset($_GET['cat_id'])) ? $_GET['cat_id'] : null;
    $correct_param = array();
    if ($id_product) {
        settype($id_product, "integer");
        if($id_product > 0) $correct_param['id'] = $id_product;
        else header("location: 404.php");
        if ($id_category) {
            settype($id_category, "integer");
            if($id_category > 0) $correct_param['cat_id'] = $id_category;
            else header("location: 404.php");
        }
    } else header("location: 404.php");
    include('application/models/product.php');
?>