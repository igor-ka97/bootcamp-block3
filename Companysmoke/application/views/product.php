<?php
header('Content-Type: text/html; charset=utf-8');

include('includes/template_header.php');
?>

<main class="inside-content">
	<nav class="bread-crumbs-container product__bread-crumbs">
		<ul class="bread-crumbs">
			<li class="bread-crumb"><a class="bread-crumb__link" href="index.html">Главная</a></li>
			<li class="bread-crumb"><a class="bread-crumb__link" href="catalog.html">Каталог</a></li>
			<li class="bread-crumb"><a class="bread-crumb__link" href="#">Электронные сигареты</a></li>
			<li class="bread-crumb bread-crumb_current">Электронная сигарета «Такая-то»</li>
		</ul>
	</nav>
	<section class="product">
		<h1 class="product__info-block-part product__headline"><?php echo  $product['name']?></h1>
		<img class="product__image" src="<?php echo $product['product_img']?>" alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
		<span class="good-price good_price product__info-block-part product__info-price"><?php echo $product['price']?><small class="good-price__currency"> руб.</small></span>
		<article class="product__description">
			<p>
				<?php if($product['description']) echo $product['description']; else echo "Описание к товару еще нет";?>
			</p>
		</article>
	</section>
</main>
			
<?php
include('includes/template_footer.php');
?>