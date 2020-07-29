<?php
include('application/models/news-detail.php');

if(isset($_GET['id'])) {
    $new = getNew($_GET['id']);
} else header('location: 404.php');

if ($new) include('application/views/news-detail.php');
else header('location: 404.php');
?>