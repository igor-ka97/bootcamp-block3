

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/companysmoke/source/css/stylesheet.css">
	<link rel="shortcut icon" href="/companysmoke/source/img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<title>Company - Интернет-магазин электронных сигарет</title>
</head>

<body>
	<header class="page-header">
		<div class="wrapper">
			<aside class="header-top">
				<div class="header-logo">
					<img class="header-logo__image" src="/companysmoke/source/img/logo.png" alt="Логотип" width="95" height="75">
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
					<?php
						foreach ($menu as $title=>$url) {
							if($_SERVER["REQUEST_URI"] == $url) {
								echo '<li class="header-nav-item"><span><span class="header-nav-item__link header-nav-item__link_current">'.$title.'</span></span>';
								if ($_SERVER["REQUEST_URI"] == "/companysmoke/catalog.php") {
									echo('<ul class="sub-menu">');
									foreach($categories_array as $categories=>$category) {
										echo('<li class="sub-menu__list-item"><a class="sub-menu__link" href="/companysmoke/catalog.php?id='.$category['category_id'].'">'.$category['name'].'</a></li>');
									}
									echo('</ul>');
								}
								echo('</li>');
							}
						else {
								echo '<li class="header-nav-item"><span><a class="header-nav-item__link" href="'.$url.'">'.$title.'</a></span></li>';
							}
						}
					?>
				</ul>
			</div>
		</nav>
	</header>
	<div class="content">
		<div class="wrapper content__wrapper">
