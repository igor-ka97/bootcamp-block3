<?php

//сюда можно сложить какие-то вспомогательные функции, функции для подключения к БД с возвратом дескриптора

function getConnection() {
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function getCategories() {
    global $connection;
    $query = "SELECT * FROM Category";
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[$element['category_id']]['title'] = $element['name'];
        $array[$element['category_id']]['img'] = $element['category_img'];
        $array[$element['category_id']]['submenu'] = null;
    }
    return $array;
}

function return404() {
    header("HTTP/1.0 404 Not Found");
    header("location: 404.php");
}

function getNews() {
    global $connection;
    $query = "SELECT news_id, title, date FROM News ORDER BY date LIMIT 0,".NEWSCOUNT;
    $result = mysqli_query($connection, $query);
    while ($element = mysqli_fetch_assoc($result)) {
        $array[] = $element;
    }
    return $array;
}

function extensionMenu($menu, $menu_additem, $submenu) {
    foreach($menu as $menu_item => $item) {
        if ($item['title'] == $menu_additem) {
            $menu[$menu_item]['submenu'] = $submenu;
            return $menu;
        }
        if($item['submenu'] != NULL) extensionMenu($menu[$menu_item]['submenu'], $menu_additem, $submenu);
    }
    return $menu;
}

function activeLinkMenu($menu, $menu_addlink, $link) {
    $menu[$menu_addlink]['activeLinks'][] = $link;
    return $menu;
}

function currentPage() {
    $cur_url = $_SERVER['REQUEST_URI'];
	$urls = explode('/', $cur_url);
    $urls[1] = (!empty($urls[1])) ? explode('?',$urls[1])[0] : null;
    return $urls[1];						
}

function pagination($page, $count_pages, $correct_param = false){
    $forward = null; 
    $pagination = '';
    $uri = '?';
    if($correct_param) $uri .= http_build_query($correct_param).'&';
    for ($i = 1; $i <= $count_pages; $i++) {
        if ($page == $i) $pagination= $pagination."<li class='paginator__elem paginator__elem_current'><span class='paginator__link'>$i</span></li>";
        else $pagination= $pagination."<li class='paginator__elem'><a href='{$uri}page=" .($i)."' class='paginator__link'>$i</a></li>";
    }

    if( $page < $count_pages ){
        $forward = "<li class='paginator__elem paginator__elem_next'><a href='{$uri}page=" .($page+1). "' class='paginator__link'>Следующая страница</a></li>";
    }
    return $pagination.$forward;
}
?>