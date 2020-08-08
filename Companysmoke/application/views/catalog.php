<?php
include('includes/template_header.php');
?>
<h1 class="invisible">Каталог товаров</h1>
<nav class="bread-crumbs-container">
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
<form class="search-filter" id="catalog-page__search-filter-1" method="GET" action="catalog.php">
	<?if(isset($correct_param['category_id'])):?>
		<input type="hidden" name="id" value="<?=$correct_param['category_id']?>">
	<?endif?>
	<span class="search-filter__item">
		<label class="search-filter__label" for="price-from">Цена</label>
		<input class="search-filter__input" step="0.01" type="number" min="0" name="price_from" id="price-from" value="<?=(isset($correct_param['price_from'])) ? $correct_param['price_from'] : null?>" placeholder="от">
	</span>
	<span class="search-filter__item">
		<label class="search-filter__label" for="price-to">—</label>
		<input class="search-filter__input" step="0.01" type="number" min="0" name="price_to" id="price-to" value="<?=(isset($correct_param['price_to'])) ? $correct_param['price_to'] : null?>" placeholder="до">
	</span>
	<input class="form-submit search-filter__apply" type="submit" value="Применить">
</form>
<ul class="categories categories__reposition">
	<?if($products):?>
		<?foreach($products as $product):?> 
			<li class="category good-piece">
				<a class="category__link" href="/product.php?id=<?=$product['product_id'].$cat_param?>">
					<img class="category__image good__image" src=<?=($product['product_img']) ? $product['product_img'] : 'source/img/category-none.jpg'?> alt="category-image-1">
					<span class="category__name-container good_name"><span class="category__name-inner"><?=$product['name'] ?></span></span> 
				</a>
				<span class="good-price good_price"><?= $product['price'] ?> <small class="good-price__currency">руб.</small></span>
			</li>
		<?endforeach?>
	<?else:?>
		<p>По заданному запросу товаров нет.</p>
	<?endif?>
</ul>
<ul class="paginator catalog-page__paginator">
	<?=($count_pages>1) ? $pagination : null?>
</ul>
<?php
include('includes/template_footer.php');
?>
