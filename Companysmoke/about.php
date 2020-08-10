<?php
    include("includes/lib.php");
    include("includes/config.php");
    $news_array = getNews();
    $categories = getCategories();
    include("application/views/includes/template_header.php");
?>
Здесь информация о компании
<?php
    include("application/views/includes/template_footer.php");
?>