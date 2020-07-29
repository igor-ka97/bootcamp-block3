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

function pagination($page, $count_pages){
    $forward = null; 
    $pagination = '';
    $uri = "?";
    $url = $_SERVER['REQUEST_URI'];
    $url = explode("?", $url);
    if(isset($url[1]) && $url[1] != '') {
        $params = explode("&", $url[1]);
        foreach($params as $param){
            if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
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

function breadcrumbs() {
    $cur_url = $_SERVER['REQUEST_URI'];
    $urls = explode('/', $cur_url);
    print_r($urls);
    $crumbs = array();
    print_r($crumbs);
}
?>