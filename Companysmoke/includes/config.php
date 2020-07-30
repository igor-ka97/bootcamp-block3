<?php
    //сюда все ключевые константы через const или define
    //или через JSON
    //или через ассоциативный массив
    
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "companysmoke");
    CONST PAGECOUNT = 6;
    CONST NEWSCOUNT = 6;
    CONST PAGENEWSCOUNT = 4;

    $categories_array = getCategories();
    $news_array = getNews();

    $menu = array (
        "Главная"=>"/companysmoke", 
        "Каталог"=>"catalog.php",
        "О компании"=>"about.php", 
        "Новости"=>"news.php",
        "Доставка и оплата"=>"paydelivery.php", 
        "Контакты"=>"contacts.php"
    );
?>