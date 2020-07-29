<?php
    //сюда все ключевые константы через const или define
    //или через JSON
    //или через ассоциативный массив
    
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "companysmoke");
    CONST PAGECOUNT = 1;
    CONST NEWSCOUNT = 6;
    CONST PAGENEWSCOUNT = 4;
    $categories_array = getCategories();
    $news_array = getNews();

    $menu = array (
        "Главная"=>"/companysmoke", 
        "Каталог"=>"/companysmoke/catalog.php",
        "О компании"=>"/companysmoke/about.php", 
        "Новости"=>"/companysmoke/news.php",
        "Доставка и оплата"=>"/companysmoke/paydelivery.php", 
        "Контакты"=>"/companysmoke/contacts.php"
    );
?>