<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>

<main class="inside-content">
	<h2 class="sidebar__headline news__headline">Новости</h2>
	<ul class="news-list">
		<?php foreach($all_news as $news=>$new): ?>
			<li class="news-item">
				<a class="news-item__link" href="/companysmoke/news-detail.php?id=<?php echo $new['news_id']?>"><?php echo $new['title']?></a>
				<span class="news-item__date"><?php echo $new['date']?></span>
				<p><?php echo $new['preview']?></p>
			</li>
		<?php endforeach; ?>
	</ul>
	<ul class="paginator catalog-page__paginator">
		<?php if( $count_pages > 1 )  echo $pagination?>
	</ul>
</main>


<?php
include('includes/template_footer.php');
?>