<?
extensionMenu($menu, 'Каталог', $categories);
activeLinkMenu($menu, 'catalog.php', 'product.php');
activeLinkMenu($menu, 'news.php', 'news-detail.php');
activeLinkMenu($menu, 'index.php', '');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/source/css/stylesheet.css">
	<link rel="shortcut icon" href="/source/img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<title><?=(isset($breadcrumbs)) ? array_key_last($breadcrumbs) : $menu[currentPage()]['title']?></title>
</head>

<body>
	<header class="page-header">
		<div class="wrapper">
			<aside class="header-top">
				<div class="header-logo">
					<img class="header-logo__image" src=" /source/img/logo.png" alt="Логотип" width="95" height="75">
					<span class="header-logo__caption">Company</span>
				</div>
				<div class="company-info">
					<b class="company-info__tagline">Нанотехнологии здоровья</b>
					<div class="contacts">
						<a class="contacts__link-mail" href="mailto:info@company.ru">info@company.ru</a>
						<a class="contacts__link-phone" href="tel:+73833491849">+7 (383) 349-18-49</a>
					</div>
				</div>
			</aside>
			<div class="user-info">
				
			</div>
		</div>
		<nav class="header-nav">
			<div class="wrapper">
				<span class="menu-toggler">Меню</span>
				<ul class="menu-togglable">
					<?
						$current_page = currentPage();
						foreach ($menu as $menu_item=>$item) {
								if($current_page == $menu_item || ($item['activeLinks'] != null && in_array($current_page, $item['activeLinks']))) { 
									echo '<li class="header-nav-item"><span><span class="header-nav-item__link header-nav-item__link_current">'.$item['title'].'</span></span>';
								
								if(isset($item['submenu'])) {
									echo('<ul class="sub-menu">');
									foreach($item['submenu'] as $category=>$cat_item) {
										echo('<li class="sub-menu__list-item"><a class="sub-menu__link" href="catalog.php?id='.$category.'">'.$cat_item['title'].'</a></li>');
									}
									echo('</ul>');
								}
								echo('</li>');
							}
						else {
								echo '<li class="header-nav-item"><span><a class="header-nav-item__link" href="'.$menu_item.'">'.$item['title'].'</a></span></li>';
							}
						
						}
					?>
				</ul>
			</div>
		</nav>
	</header>
	<div class="content">
		<div class="wrapper content__wrapper">
		<main class="<?=(currentPage() == '' || currentPage() == 'index.php') ? "categories" : "inside-content"?>">
