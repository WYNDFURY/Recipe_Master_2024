<?php use Core\Tools;

use function Core\Tools\slugify;

?>

<?php
/*
    Variable disponible
        - $categories
*/
?>
<ul class="list-reset text-gray-100">
    <?php foreach ($categories as $category) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="categories/<?php echo $category['id'];?>/<?php echo slugify( $category['name']);?>">
                <?php echo $category['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>