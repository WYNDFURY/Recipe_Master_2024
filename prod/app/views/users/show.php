<?php

use Core\Tools;

use function Core\Tools\truncateText;
use function Core\Tools\Slugify;

?>
<!-- Main content -->
<div class="p-3">
    <!-- Hero User Profile -->
    <section class="relative mb-6">
        <img
            class="w-full h-96 object-cover"
            src="../app/media/pictures/<?php echo $chef['chef_picture'];?>"
            alt="User Profile Image"
        />
        <div
            class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
        >
            <h1 class="text-3xl font-bold mb-2 text-white">
                <?php echo $chef['chef_name']; ?>
            </h1>
            <p class="text-gray-300 mb-4">
                <?php echo $chef['chef_biography']; ?>
            </p>
        </div>
    </section>

    <!-- User's Recipes -->
    <section>
        <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($user_recipes as $recipe) : ?>
                <!-- Recipe Card -->
                <article
                    class="bg-white rounded-lg overflow-hidden shadow-lg relative"
                >
                    <img
                        src="https://source.unsplash.com/480x360/?recipe"
                        alt="Recipe Image"
                        class="w-full h-48 object-cover"
                    />
                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-2"><?php echo $recipe['recipe_name']; ?></h3>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                            <span><?php echo $recipe['recipe_avg_rating']; ?></span>
                        </div>
                        <p class="text-gray-600">
                            <?php echo truncateText($recipe['recipe_description'], 150); ?>
                        </p>
                        <a
                            href="recipes/<?php echo $recipe['recipe_id']; ?>/<?php echo slugify($recipe['recipe_name']); ?>"
                            class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                        >
                            Voir la recette
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>