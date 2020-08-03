

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/source/css/stylesheet.css">
	<link rel="shortcut icon" href="/source/img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<title>Company - Интернет-магазин электронных сигарет. <?=$menu[currentPage()]['title']?></title>
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
					<?showMenu()?>
				</ul>
			</div>
		</nav>
	</header>
	<div class="content">
		<div class="wrapper content__wrapper">
