<?php
    include("includes/lib.php");
    include("includes/config.php");
    include("application/views/includes/template_header.php");
    $news_array = getNews();
?>
<main class="inside-content">Здесь информация о компании</main>
<?php
    include("application/views/includes/template_footer.php");
?>