<?php
    include("includes/lib.php");
    include("includes/config.php");
    include("application/views/includes/template_header.php");
    $news_array = getNews();
    $categories = getCategories();
?>
Здесь информация о компании
<?php
    include("application/views/includes/template_footer.php");
?>