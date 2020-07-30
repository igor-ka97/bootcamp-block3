<?php

//сюда можно сложить какие-то вспомогательные функции, функции для подключения к БД с возвратом дескриптора

function getConnection() {
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function getCategories() {
    $connection = getConnection();
    $query = "SELECT * FROM Category";
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[] = $element;
    }
    return $array;
}

function getNews() {
    $connection = getConnection();
    $query = "SELECT news_id, title, date FROM News ORDER BY date LIMIT 0,".NEWSCOUNT;
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[] = $element;
    }
    return $array;
}

function getProductq($id) {
    $connection = getConnection();
    $query = "SELECT * FROM Product WHERE product_id = $id";
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[] = $element;
    }
    return $array;
}

function pagination($page, $count_pages){
    $forward = null; 
    $pagination = '';
    $uri = "?";
    $url = $_SERVER['REQUEST_URI'];
    $url = explode("?", $url);
    if(isset($url[1]) && $url[1] != '') {
        $params = explode("&", $url[1]);
        foreach($params as $param){
            if(!preg_match("#page=#", $param)) $uri .= "{$param}&";
        }
    }

    for ($i = 1; $i <= $count_pages; $i++) {
        if ($page == $i) $pagination= $pagination."<li class='paginator__elem paginator__elem_current'><span class='paginator__link'>$i</span></li>";
        else $pagination= $pagination."<li class='paginator__elem'><a href='{$uri}page=" .($i)."' class='paginator__link'>$i</a></li>";
    }

    if( $page < $count_pages ){
        $forward = "<li class='paginator__elem paginator__elem_next'><a href='{$uri}page=" .($page+1). "' class='paginator__link'>Следующая страница</a></li>";
    }

    return $pagination.$forward;
}

function breadcrumbs($categories_array = null) {
    $breadcrambs = "<li class='bread-crumb'><a class='bread-crumb__link' href='/companysmoke'>Главная</a></li> ";
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $cat_id = (isset($_GET['cat_id'])) ? $_GET['cat_id'] : null;
    $cur_url = $_SERVER['REQUEST_URI'];
    $urls = explode('/', $cur_url);
    if (strpos($urls[2], "catalog.php") !== false) {
        if ($id) {
            foreach ($categories_array as $categories => $category) {
                if ($category['category_id'] == $id) {
                    $name = $category['name'];
                    break;
                }  
            }
            $breadcrambs .= "<li class='bread-crumb bread-crumb_current'>$name</li>";
        } else $breadcrambs .= "<li class='bread-crumb bread-crumb_current'>Каталог</li>";
    } else if (strpos($urls[2], "product.php") !== false) {
        $product = getProductq($id);
        $breadcrambs .= "<li class='bread-crumb'><a class='bread-crumb__link' href='catalog.php'>Каталог</a></li>";
        if($cat_id) {
            foreach ($categories_array as $categories => $category) {
                if ($category['category_id'] == $cat_id) {
                    $name = $category['name'];
                    break;
                }  
            }
            $breadcrambs .= "<li class='bread-crumb'><a class='bread-crumb__link' href='catalog.php?id=$cat_id'>$name</a></li>";
        } else {
            foreach ($categories_array as $categories => $category) {
                if ($category['category_id'] == $product[0]['category_id']) {
                    $cat_id = $category['category_id'];
                    $name = $category['name'];
                    break;
                } 
            } 
            $breadcrambs .= "<li class='bread-crumb'><a class='bread-crumb__link' href='catalog.php?id=$cat_id'>$name</a></li>";
        
    }
        $breadcrambs .= "<li class='bread-crumb bread-crumb_current'>".$product[0]['name']."</li>";
    } else if ((strpos($urls[2], "news.php")) !== false) {
        $breadcrambs .= "<li class='bread-crumb bread-crumb_current'>Новости</li>";
    } else if (strpos($urls[2], "news-detail.php") !== false) {
        $breadcrambs .=  "<li class='bread-crumb'><a class='bread-crumb__link' href='news.php'>Новости</a></li>";
    }
    echo($breadcrambs);

}
?>