<?php
    $news_array = getNews();
    $categories = getCategories();

    if(isset($correct_param['category_id']) && !array_key_exists($correct_param['category_id'], $categories)) header("location: 404.php");

    $where_from_prod = '';
    $where_from_prodcat = '';
    foreach ($correct_param as $param=>$value) {
        switch ($param) {
            case 'category_id':
                $sign = 'category_id =';
                break;
            case 'price_from':
                $sign = 'p.price >= ';
                break;
            case 'price_to':
                $sign = 'p.price <= ';
                break;
        }

        if ($where_from_prod == '') {
            if ($param == 'category_id') {
                $where_from_prod .= "p.$sign $value";
                $where_from_prodcat .= "pc.$sign $value";
            } else {
                $where_from_prod .= "$sign $value";
                $where_from_prodcat .= "$sign $value";
            }
        }
        else {
            $where_from_prod .= " AND $sign $value";
            $where_from_prodcat .= " AND $sign $value";
        }
    }

    $query_from_prod = "SELECT product_id, product_img, name, price FROM Product p";
    $query_from_prodcat = "SELECT p.product_id, p.product_img, p.name, p.price FROM Product p JOIN ProductCategory pc ON p.product_id = pc.product_id";
    if ($where_from_prod != '') $query_from_prod = $query_from_prod." WHERE ".$where_from_prod;
    if ($where_from_prodcat != '') $query_from_prodcat = $query_from_prodcat." WHERE ".$where_from_prodcat;
    $query = "SELECT COUNT(*) AS count FROM ($query_from_prod UNION $query_from_prodcat) AS Products";
    $count_pages = mysqli_query($connection, $query);
    $count_pages =  mysqli_fetch_assoc($count_pages);
    $count_pages = ceil($count_pages['count']/PAGECOUNT);
    if( !$count_pages ) $count_pages = 1;
    if( $page > $count_pages ) $page = $count_pages;
    $pagination = pagination($page, $count_pages, $correct_param);
    $art = ($page * PAGECOUNT) - PAGECOUNT;

    $query = "SELECT * FROM ($query_from_prod UNION $query_from_prodcat) AS Products";
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
        $name = $categories[$correct_param['category_id']]['title'];
        $breadcrumbs["$name"] = null;
        $cat_param = '&cat_id='.$correct_param['category_id'];
    }
    else {
        $breadcrumbs['Каталог'] = null;
        $cat_param = null;
    }
    include('application/views/catalog.php');
?>