<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>

<main class="categories">
    <h1 class="invisible">Company - Электронные сигареты</h1>
    <ul class="categories">
        <?php foreach($categories_array as $categories=>$category):?>
            <li class="category">
                <a class="category__link" href="/companysmoke/catalog.php?id=<?php echo $category['category_id']?>">
                <img class="category__image" src="<?php if ($category['category_img']) echo $category['category_img']; else echo'source/img/category-none.jpg';?>" alt="category-image-1">
                <span class="category__name-container"><span class="category__name-inner"><?php echo $category['name']?></span></span>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</main>
			
<?php
include('includes/template_footer.php');
?>