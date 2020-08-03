<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/template_header.php');
?>
<main class="categories">
    <h1 class="invisible">Company - Электронные сигареты</h1>
    <ul class="categories">
        <?foreach($menu['catalog.php']['categories'] as $categories=>$category):?>
            <li class="category">
                <a class="category__link" href="/catalog.php?id=<?=$category['category_id']?>">
                    <img class="category__image" src="<?=($category['category_img']) ? $category['category_img'] : 'source/img/category-none.jpg'?>" alt="category-image-1">
                    <span class="category__name-container"><span class="category__name-inner"><?=$category['name']?></span></span>
                </a>
            </li>
        <?endforeach?>
    </ul>
</main>		
<?php
include('includes/template_footer.php');
?>