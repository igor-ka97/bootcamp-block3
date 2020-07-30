<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>

<main class="inside-content">
<nav class="bread-crumbs-container product__bread-crumbs">
		<ul class="bread-crumbs">
			<?php breadcrumbs(); ?>
		</ul>
	</nav>
	<h1>Новости</h1>
	<ul class="news-list">
	<?php if($all_news): ?>
		<?php foreach($all_news as $news=>$new): ?>
			<li class="news-item">
				<a class="news-item__link" href="/companysmoke/news-detail.php?id=<?php echo $new['news_id']?>"><?php echo $new['title']?></a>
				<span class="news-item__date"><?php echo $new['date']?></span>
				<p><?php echo $new['preview']?></p>
			</li>
		<?php endforeach; ?>
		<?php else: ?>
				<p>Пока новостей нет</p>
			<?php endif; ?>
	</ul>
	<ul class="paginator catalog-page__paginator">
		<?php if( $count_pages > 1 )  echo $pagination?>
	</ul>
</main>


<?php
include('includes/template_footer.php');
?>