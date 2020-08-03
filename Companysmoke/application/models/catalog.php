<?php
    $news_array = getNews();
    $where1 = '';
    $where2 = '';
    foreach ($correct_param as $param=>$value) {
        if ($param == 'category_id') $sign = 'category_id =';
        if ($param == 'price_from') $sign = 'p.price >= ';
        if ($param == 'price_to') $sign = 'p.price <= ';
        if ($where1 == '') {
            if ($param == 'category_id') {
                $where1 .= "p.$sign $value";
                $where2 .= "pc.$sign $value";
            } else {
                $where1 .= "$sign $value";
                $where2 .= "$sign $value";
            }
        }
        else {
            $where1 .= " AND $sign $value";
            $where2 .= " AND $sign $value";
        }
    }
    $query1 = "SELECT product_id, product_img, name, price FROM Product p";
    $query2 = "SELECT p.product_id, p.product_img, p.name, p.price FROM Product p JOIN ProductCategory pc ON p.product_id = pc.product_id";
    if ($where1 != '') $query1 = $query1." WHERE ".$where1;
    if ($where2 != '') $query2 = $query2." WHERE ".$where2;
    $query = "SELECT COUNT(*) AS count FROM ($query1 UNION $query2) AS Products";
    $count_pages = mysqli_query($connection, $query);
    $count_pages =  mysqli_fetch_assoc($count_pages);
    $count_pages = ceil($count_pages['count']/PAGECOUNT);
    if( !$count_pages ) $count_pages = 1;
    if( $page > $count_pages ) $page = $count_pages;
    $pagination = pagination($page, $count_pages);
    $art = ($page * PAGECOUNT) - PAGECOUNT;
    $query = "SELECT * FROM ($query1 UNION $query2) AS Products";
    $query = $query." ORDER BY product_id";
    $query = $query." LIMIT $art, ". PAGECOUNT;
    $result = mysqli_query($connection, $query);
    $products = array();
    while ($product = mysqli_fetch_assoc($result)) {
        $products[] = $product;
    }
    $breadcrumbs = array();
    $breadcrumbs['Главная'] = '/';
    if (array_key_exists('category_id', $correct_param)) {
        foreach ($menu['catalog.php']['categories'] as $categories => $category) {
            if ($category['category_id'] == $correct_param['category_id']) {
                $name = $category['name'];
                break;
            }  
        }
        $breadcrumbs["$name"] = null;
        $category = '&cat_id='.$correct_param['category_id'];
    }
    else {
        $breadcrumbs['Каталог'] = null;
        $category = null;
    }
    include('application/views/catalog.php');
?>