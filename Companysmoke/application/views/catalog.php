<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>

<main class="inside-content">
	<h1 class="invisible">Каталог товаров</h1>
	<nav class="bread-crumbs-container">
	<ul class="bread-crumbs">
		<?php breadcrumbs($categories_array) ?>
	</ul>
	</nav>

	<form class="search-filter" id="catalog-page__search-filter-1" method="GET" action="catalog.php">
		<?php if (isset($_GET['id'])): ?> <input type="hidden" name="id" value="<?= $_GET['id']?>"> <?php endif;?>
		<span class="search-filter__item">
		<label class="search-filter__label" for="price-from">Цена</label>
		<input class="search-filter__input" step="0.01" type="number" min="0" name="price_from" id="price-from" placeholder="от">
		</span>
		<span class="search-filter__item">
		<label class="search-filter__label" for="price-to">—</label>
		<input class="search-filter__input" type="number" min="0" name="price_to" id="price-to" placeholder="до">
		</span>
		<input class="form-submit search-filter__apply" type="submit" value="Применить">
	</form>

	<ul class="categories categories__reposition">
	<?php if($products): ?>
		<?php foreach ($products as $product):?> 
			<li class="category good-piece">
			<a class="category__link" href="/companysmoke/product.php?id=<?php echo $product['product_id'].$get_category?>">
			<img class="category__image good__image" src=<?php echo ($product['product_img']) ? $product['product_img'] : 'source/img/category-none.jpg'?> alt="category-image-1">
			<span class="category__name-container good_name"><span class="category__name-inner"><?= $product['name'] ?></span></span>
			</a>
			<span class="good-price good_price"><?= $product['price'] ?> <small class="good-price__currency">руб.</small></span>
			</li>
		<?php endforeach; ?>
		<?php else: ?>
				<p>По заданному запросу товаров нет.</p>
			<?php endif; ?>
	</ul>
	<ul class="paginator catalog-page__paginator">
		<?php if( $count_pages > 1 )  echo $pagination?>
	</ul>
</main>

<?php
include('includes/template_footer.php');
?>
