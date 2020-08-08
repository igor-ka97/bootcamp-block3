<?php
    include_once("includes/lib.php");
    include_once("includes/config.php");
    $id_cat = (isset($_GET['id'])) ? $_GET['id'] : null;
    $price_from = (isset($_GET['price_from'])) ? $_GET['price_from'] : null;
    $price_to = (isset($_GET['price_to'])) ? $_GET['price_to'] : null;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $correct_param = array();
    if($id_cat) {
        if(!settype($id_cat, "integer")) header("location: 404.php");
        if (preg_match('#^[1-9][0-9]*$#', $id_cat)) $correct_param['category_id'] = $id_cat;
        else header("location: 404.php");  
    } 

    if($price_from) {
        if(!settype($price_from, "float")) header("location: 404.php"); 
        if (preg_match('#^([1-9][0-9]*|0)([.][0-9]+)*$#', $price_from)) $correct_param['price_from'] = $price_from;
        else header("location: 404.php");
    }
    if($price_to) {
        if(!settype($price_to, "float")) header("location: 404.php"); 
        if (preg_match('#^([1-9][0-9]*|0)([.][0-9]+)*$#', $price_from)) $correct_param['price_to'] = $price_to;
        else header("location: 404.php");
    }
    if ($price_from && $price_to) {
        if ($price_from > $price_to) header("location: 404.php"); 
    }
    if (settype($page, "integer")) {
        if( $page < 1 ) $page = 1;
    }
    include('application/models/catalog.php');
?>