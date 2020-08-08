<?php
include('includes/template_header.php');
?>

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
<article class="shipment-article">
	<span class="news-item__date"><?= $news['date']?></span>
	<h1><?= $news['title']?></h1>
	<p><?= $news['preview']?></p>
	<p><?= $news['description']?></p>
</article>

<?php
include('includes/template_footer.php');
?>