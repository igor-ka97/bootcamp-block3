<?php
    include_once("includes/lib.php");
    include_once("includes/config.php");
    $news_array = getNews();
    $categories = getCategories();
    $menu = extensionMenu($menu, 'Каталог', $categories);
    
    if(isset($correct_param['category_id']) && !array_key_exists($correct_param['category_id'], $categories)) {
        return404();
    }
    $where = '';
    foreach ($correct_param as $param=>$value) {
        switch ($param) {
            case 'category_id':
                $sign = 'pc.category_id =';
                break;
            case 'price_from':
                $sign = 'p.price >= ';
                break;
            case 'price_to':
                $sign = 'p.price <= ';
                break;
        }

        if ($where == '') $where .= "$sign $value";
        else $where .= " AND $sign $value";
    }

    if(isset($correct_param['category_id'])) {
        $query_count = "SELECT COUNT(*) AS count FROM Product p JOIN ProductCategory pc on p.product_id = pc.product_id";
        $query_products = "SELECT p.product_id, p.product_img, p.name, p.price FROM Product p JOIN ProductCategory pc on p.product_id = pc.product_id";
    } else {
        $query_count = "SELECT COUNT(*) AS count FROM Product p";
        $query_products = "SELECT p.product_id, p.product_img, p.name, p.price FROM Product p";
    }


    if ($where != '') {
        $query_count = $query_count." WHERE ".$where;
        $query_products = $query_products." WHERE ".$where;
    }
    $count_pages = mysqli_query($connection, $query_count);
    $count_pages =  mysqli_fetch_assoc($count_pages);
    $count_pages = ceil($count_pages['count']/PAGECOUNT);
    if( !$count_pages ) $count_pages = 1;
    if( $page > $count_pages ) $page = $count_pages;
    $pagination = pagination($page, $count_pages, $correct_param);
    $art = ($page * PAGECOUNT) - PAGECOUNT;

    $query_products = $query_products." ORDER BY product_id";
    $query_products = $query_products." LIMIT $art, ". PAGECOUNT;
    $result = mysqli_query($connection, $query_products);

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