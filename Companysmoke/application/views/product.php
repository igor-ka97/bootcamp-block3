<?php
header('Content-Type: text/html; charset=utf-8');

include('includes/template_header.php');
?>

<main class="inside-content">
	<nav class="bread-crumbs-container product__bread-crumbs">
		<ul class="bread-crumbs">
		<?foreach($breadcrumbs as $title=>$link):?> 
				<?if($link):?>
					<li class="bread-crumb"><a class="bread-crumb__link" href="<?=$link?>"><?=$title?></a></li>
				<?else:?>
					<li class="bread-crumb bread-crumb_current"><?=$title?></li>
				<?endif?>
			<?endforeach?>
		</ul>
	</nav>
	<section class="product">
		<h1 class="product__info-block-part product__headline"><?=$product['name']?></h1>
		<img class="product__image" src="<?=($product['product_img']) ? $product['product_img'] : 'source/img/category-none.jpg'?>" alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
		<span class="good-price good_price product__info-block-part product__info-price"><?=$product['price']?><small class="good-price__currency"> руб.</small></span>
		<article class="product__description">
			<p>
				<?=($product['description']) ? $product['description'] : "Описание к товару еще нет";?>
			</p>
		</article>
	</section>
</main>


<?php
include('includes/template_footer.php');
?>