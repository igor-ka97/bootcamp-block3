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
            'title' => 'Главная',
            'activeLinks' => null,
            'submenu' => null
        ], 
        'catalog.php' => [
            'title' => 'Каталог',
            'activeLinks' => null,
            'submenu' => null
        ],
        'about.php' => [
            'title' => 'О компании',
            'activeLinks' => null,
            'submenu' => null
        ], 
        'news.php' => [
            'title' => 'Новости',
            'activeLinks' => null,
            'submenu' => null
        ],
        'paydelivery.php' => [
            'title' => 'Доставка и оплата',
            'activeLinks' => null,
            'submenu' => null
        ], 
        'contacts.php' => [
            'title' => 'Контакты',
            'activeLinks' => null,
            'submenu' => null
        ]
    );
?>