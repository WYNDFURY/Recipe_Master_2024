<?php
/*
    Variable disponible
        - $ingredients
*/
?>
<ul class="list-reset text-gray-200">
    <?php foreach ($ingredients as $ingredient) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="#">
                <?php echo $ingredient['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>