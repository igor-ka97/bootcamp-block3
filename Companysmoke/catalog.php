<?php
    include_once("includes/lib.php");
    include_once("includes/config.php");

    $id_cat = (isset($_GET['id'])) ? $_GET['id'] : null;
    $price_from = (isset($_GET['price_from'])) ? $_GET['price_from'] : null;
    $price_to = (isset($_GET['price_to'])) ? $_GET['price_to'] : null;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $find = false;
    $correct_param = array();
    if($id_cat) {
        foreach($menu['catalog.php']['categories'] as $categories=>$category) {
            if($category['category_id'] == $id_cat) {
                $find = true;
                $correct_param['category_id'] = $id_cat;
                break;
            }
        }
        if (!$find) header("location: 404.php"); 
    }
    if($price_from) {
        if(!settype($price_from, "integer")) header("location: 404.php"); 
        $correct_param['price_from'] = $price_from;
    }
    if($price_to) {
        if(!settype($price_to, "integer")) header("location: 404.php"); 
        $correct_param['price_to'] = $price_to;
    }
    if ($price_from && $price_to) {
        if ($price_from > $price_to) header("location: 404.php"); 
    }
    if (settype($page, "integer")) {
        if( $page < 1 ) $page = 1;
    }
    include('application/models/catalog.php');
?>