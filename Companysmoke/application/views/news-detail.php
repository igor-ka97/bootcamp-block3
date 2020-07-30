<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>

<main class="inside-content">
<nav class="bread-crumbs-container product__bread-crumbs">
		<ul class="bread-crumbs">
			<?php breadcrumbs() ?>
		</ul>
	</nav>
	<article class="shipment-article">
		<span class="news-item__date"><?php echo $new['date']?></span>
		<h1><?php echo $new['title']?></h1>
		<p><?php echo $new['preview']?></p>
		<p><?php echo $new['description']?></p>
	</article>
</main>

<?php
include('includes/template_footer.php');
?>