<?php

    $id_cat = (isset($_GET['id'])) ? $_GET['id'] : null;
    $price_from = (isset($_GET['price_from'])) ? $_GET['price_from'] : null;
    $price_to = (isset($_GET['price_to'])) ? $_GET['price_to'] : null;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $correct_param = array();
    if($id_cat) {
        if(!settype($id_cat, "integer") || $id_cat < 0) return404();
        $correct_param['category_id'] = $id_cat;
    } 

    if($price_from) {
        if(!settype($price_from, "float") || $price_from < 0) return404(); 
        $correct_param['price_from'] = $price_from;
    }

    if($price_to) {
        if(!settype($price_to, "float") || $price_to < 0) return404(); 
        $correct_param['price_to'] = $price_to;
    }
    if ($price_from && $price_to) {
        if ($price_from > $price_to) return404(); 
    }
    
    if (settype($page, "integer")) {
        if( $page < 1 ) $page = 1;
    }
    include('application/models/catalog.php');
?>