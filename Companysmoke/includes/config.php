<?php
    //сюда все ключевые константы через const или define
    //или через JSON
    //или через ассоциативный массив
    
    CONST DBHOST = 'localhost';
    CONST DBUSER = 'root';
    CONST DBPASS = '';
    CONST DBNAME = 'companysmoke';
    CONST PAGECOUNT = 6;
    CONST NEWSCOUNT = 6;
    CONST PAGENEWSCOUNT = 4;

    $connection = getConnection();
    
    $menu = array (
        'index.php'=> [
            'title' => 'Главная'
        ], 
        'catalog.php' => [
            'title' => 'Каталог',
            'categories' => getCategories()
        ],
        'about.php' => [
            'title' => 'О компании'
        ], 
        'news.php' => [
            'title' => 'Новости'
        ],
        'paydelivery.php' => [
            'title' => 'Доставка и оплата'
        ], 
        'contacts.php' => [
            'title' => 'Контакты'
        ]
    );
?>