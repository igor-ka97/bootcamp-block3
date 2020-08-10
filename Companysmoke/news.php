<?php
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    settype($page, "integer");
    include('application/models/news.php');
?>