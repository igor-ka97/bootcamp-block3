<?php
//контроллер для списка товаров. проверяем корректность параметров и подключаем соответствующую модель
function addWhere($where, $add) {
    if ($where) {
        $where .= " AND $add";
    }
    else $where = $add;
    return $where;
}

$where = '';
$page = 1;
$category = '';

include('application/models/catalog.php');

if(isset($_GET['id'])) {
    foreach($categories_array as $categories=>$category) {
        if($category['category_id'] == $_GET['id']) {
            $where = addWhere($where, "p.category_id =".$_GET['id']." OR pc.category_id =".$_GET['id']);
            $category = '&cat_id='.$_GET['id'];
            break;
        }
    }
    if ($where == '') header("location: 404.php"); 
}

if(isset($_GET['price_from'])) {
    $where = addWhere($where, "p.price  >= ".$_GET['price_from']);
}

if(isset($_GET['price_to'])) {
    $where = addWhere($where, "p.price <= ".$_GET['price_to']);
}

if(isset($_GET['page'])) {
    $page = (int)$_GET['page'];
    if( $page < 1 ) $page = 1;
}

$products = getProducts($where, $page);
$perpage = PAGECOUNT;
$count_pages = getCountPage($where);
if( !$count_pages ) $count_pages = 1;
if( $page > $count_pages ) $page = $count_pages;
$pagination = pagination($page, $count_pages);

include('application/views/catalog.php');
?>