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
            'submenu' => null
        ], 
        'catalog.php' => [
            'title' => 'Каталог',
            'submenu' => getCategories()
        ],
        'about.php' => [
            'title' => 'О компании',
            'submenu' => null
        ], 
        'news.php' => [
            'title' => 'Новости',
            'submenu' => null
        ],
        'paydelivery.php' => [
            'title' => 'Доставка и оплата',
            'submenu' => null
        ], 
        'contacts.php' => [
            'title' => 'Контакты',
            'submenu' => null
        ]
    );
?>