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
	<h1>Новости</h1>
	<ul class="news-list">
		<?if($all_news):?>
			<?foreach($all_news as $news=>$new):?>
				<li class="news-item">
					<a class="news-item__link" href="/news-detail.php?id=<?=$new['news_id']?>"><?=$new['title']?></a>
					<span class="news-item__date"><?=$new['date']?></span>
					<p><?= $new['preview']?></p>
				</li>
			<?endforeach?>
		<?else:?>
			<p>Пока новостей нет</p>
		<?endif?>
	</ul>
	<ul class="paginator catalog-page__paginator">
		<?=($count_pages>1) ? $pagination : null?>
	</ul>
</main>
<?php
include('includes/template_footer.php');
?>