<?php
include('includes/template_header.php');
?>
<h1 class="invisible">Company - Электронные сигареты</h1>
<ul class="categories">
    <?foreach($categories as $category=>$cat_item):?>
        <li class="category">
            <a class="category__link" href="/catalog.php?id=<?=$category?>">
                <img class="category__image" src="<?=($cat_item['img']) ?? 'source/img/category-none.jpg'?>" alt="category-image-1">
                <span class="category__name-container"><span class="category__name-inner"><?=$cat_item['title']?></span></span>
            </a>
        </li>
    <?endforeach?>
</ul>	
<?php
include('includes/template_footer.php');
?>