<div class="sidebar">
	<section class="catalog">
		<h2 class="sidebar__headline">Каталог</h2>
		<ul class="catalog-list">
			<?foreach($menu['catalog.php']['categories'] as $categories=>$category):?>
				<li class="catalog-list__item"><a class="catalog-list__link" href="/catalog.php?id=<?=$category['category_id']?>"><?=$category['name']?></a></li>
			<?endforeach?>
		</ul>
	</section>
	<section class="news">
		<h2 class="sidebar__headline news__headline">Новости</h2>
		<ul class="news-list">
			<?foreach($news_array as $news=>$new):?>
				<li class="news-item">
					<a class="news-item__link" href=" /news-detail.php?id=<?=$new['news_id']?>">
					<?=$new['title']?>
					</a>
					<span class="news-item__date"><?=$new['date']?></span>
				</li>
			<?endforeach?>
		</ul>
		<span class="archive"><a class="archive__link" href=" /news.php">Архив новостей</a></span>
	</section>
</div>
<?if($_SERVER["REQUEST_URI"] == " /"):?>
	<article class="seo-article">
		<h2>Высокое качество японских ножей</h2>
		<p>
		Кухонные японские ножи (ножи masahiro, касуми, хаттори) известных торговых марок уже завоевали популярность
		благодаря своей прочности и уникальным качествам - остроте и долговечности заточки. Японские ножи (ножи
		касуми, масахиро, хаттори, кухонные ножи из дамасской стали) - это профессиональные поварские инструменты,
		секреты производства которых передаются и шлифуются мастерами из поколения в поколение. Эти японские ножи
		обладают особым значением - они своего рода статус шеф-повара, в Японии обладание таким ножом считалось
		показателем высокого мастерства в поварском деле.
		</p>
		<p>
		Сегодня японские ножи соединили в себе древнейшие традиции изготовления самурайских мечей и инновационные
		технологии и, именно поэтому японские ножи обладают уникальными свойствами. Сделаны японские ножи только из
		высококачественных материалов. Клинок японского ножа делают из высокоуглеродистой стали, что обеспечивает его
		высокую прочность и надежность. Следует отметить, что японские ножи эргономичны по своему дизайну, что
		обеспечивает удобство и комфорт в работе. Японские ножи суперострые и после заточки очень долго не тупятся,
		благодаря этому уникальному качеству они получили широкую известность. Японские ножи - это прекрасный выбор,
		который говорит о требовательности покупателя к высокому качеству ножа и о его превосходном вкусе. Кстати,
		нужно отметить, что японские ножи предназначены не только для японской, но и для европейской, а также любой
		другой кухни. В известных ресторанах крупнейших городов во всем мире используют именно японские ножи.
		Японские ножи -это профессиональные инструменты для японской кухни (купить японские ножи Вы можете у нас).
		</p>
		<p>
		Интернет магазин "Chef" предлагает купить японские ножи (ножи касуми, масахиро), нож для суши. У нас есть
		японские ножи из дамасской стали (ножи masahiro, касуми). Дамасская сталь - это не просто причудливый узор на
		лезвии ножа, это технология, сочетающая твердую сталь сердцевины клинка для сохранения остроты ножа и
		множество слоев мягкой стали, которая и создает рисунок при заточке, для придания гибкости и прочности
		острой, но хрупкой сердцевине. По этой технологии делались древние острейшие самурайские мечи катаны. Ножи из
		дамасской стали прочны, надежны и долговечны, что подтверждено многолетним опытом. Не зря ножи из дамасской
		стали бестселлерами продаж. Есть также товары, которые являются результатом современных научных технологий:
		титановые, керамические ножи из Японии.
		</p>
	</article>		
<?endif?>
</div>
</div>
<footer class="page-footer">
	<div class="wrapper page-footer__wrapper">
		<div class="copyright">
			<span class="copyright__part copyright__lifetime">Copyright ©2007-2010</span>
			<span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>, 2010</span>
			<img class="copyright__image" src=" /source/img/logo.png" alt="Company-logo">
			<span class="copyright__part copyrhigt__company-name">Company</span>
		</div>
		<nav class="footer-nav">
			<ul class="footer-nav__list">
				<?showMenuFooter()?>
			</ul>
		</nav>
		<div class="developer">
			<span class="developer__ref">Разработка сайта - <a class="developer__link" href="https://itconstruct.ru/">ITConstruct</a></span>
			<img class="counter" src=" /source/img/counter.png" alt="Page-counter">
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src=" /source/js/script.js"></script>
</body>
</html>