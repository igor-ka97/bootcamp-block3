<?php

    include_once("includes/lib.php");
    include_once("includes/config.php");

    function getProducts($where, $page) {
        $art = ($page * PAGECOUNT) - PAGECOUNT;
        $connection = getConnection();
        $query = "SELECT distinct p.product_id, p.name, p.price, p.product_img FROM Product p LEFT JOIN ProductCategory pc ON p.product_id = pc.product_id";
        if ($where != '') $query = $query." WHERE ".$where;
        $query = $query." ORDER BY p.product_id";
        $query = $query." LIMIT $art, ". PAGECOUNT;
        $result = mysqli_query($connection, $query);
        $array = array();
        while ($element = mysqli_fetch_assoc($result)) {
            $array[] = $element;
        }
        return $array;
    }

    function getCountPage($where) {
        $connection = getConnection();
        $query = "SELECT COUNT(distinct p.product_id) AS count FROM Product p LEFT JOIN ProductCategory pc ON p.product_id = pc.product_id";
        if ($where != '') $query = $query." WHERE ".$where;
        $result = mysqli_query($connection, $query);
        $result =  mysqli_fetch_assoc($result);
        return ceil($result['count']/PAGECOUNT);
    }
?>