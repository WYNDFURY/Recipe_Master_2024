<?php use Core\Tools;

use function Core\Tools\Slugify;
use function Core\Tools\truncateText;

 ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($popularRecipes as $popularRecipe) : ?>
        <!-- Recipe Card -->
        <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
            <img class="w-full h-48 object-cover" src="https://source.unsplash.com/480x360/?recipe" alt="Recipe Image" />
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2"><?php echo $popularRecipe['recipe_name']?></h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                    <span>4.5</span>
                </div>
                <p class="text-gray-600"><?php echo truncateText($popularRecipe['recipe_description'], 100)?></p>
                <div class="flex items-center mt-4">
                    <span class="text-gray-700 mr-2"><?php echo $popularRecipe['recipe_chef'];?></span>
                    <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $popularRecipe['recipe_comment'];?> commentaires</span>
                </div>
                <a href="recipes/<?php echo $popularRecipe['recipe_id']; ?>/<?php echo slugify($popularRecipe['recipe_name']); ?>" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    Voir la recette
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>