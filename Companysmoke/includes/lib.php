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


function showMenu() {
    $current_page = currentPage();
    if ($current_page == 'news-detail.php') $current_page = 'news.php';
    if ($current_page == 'product.php') $current_page = 'catalog.php';
    if ($current_page == '') $current_page = 'index.php';
    global $menu;
    foreach ($menu as $menu_item=>$item) {
            if($current_page == $menu_item) { 
                echo '<li class="header-nav-item"><span><span class="header-nav-item__link header-nav-item__link_current">'.$item['title'].'</span></span>';
            
            if($current_page == "catalog.php") {
                echo('<ul class="sub-menu">');
                foreach($item['categories'] as $categories=>$category) {
                    echo('<li class="sub-menu__list-item"><a class="sub-menu__link" href=" /catalog.php?id='.$category['category_id'].'">'.$category['name'].'</a></li>');
                }
                echo('</ul>');
            }
            echo('</li>');
        }
    else {
            echo '<li class="header-nav-item"><span><a class="header-nav-item__link" href="'.$menu_item.'">'.$item['title'].'</a></span></li>';
        }
    
    }
}

function showMenuFooter() {
    $current_page = currentPage();
    if ($current_page == 'news-detail.php') $current_page = 'news.php';
    if ($current_page == 'product.php') $current_page = 'catalog.php';
    if ($current_page == '') $current_page = 'index.php';
    global $menu;
    foreach ($menu as $menu_item=>$item) {
        if($current_page == $menu_item) { 
            echo '<li class="footer-nav__list-item"><span class="footer-nav__link">'.$item['title'].'</span></li>';
        }
        else {
            echo '<li class="footer-nav__list-item"><a class="footer-nav__link" href="'.$menu_item.'">'.$item['title'].'</a></li>';
        }
    }
}

function currentPage() {
    $cur_url = $_SERVER['REQUEST_URI'];
	$urls = explode('/', $cur_url);
    $urls[1] = (!empty($urls[1])) ? explode('?',$urls[1])[0] : null;
    return $urls[1];						
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
?>