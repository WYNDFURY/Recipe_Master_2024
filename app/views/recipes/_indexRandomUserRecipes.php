<?php use Core\Tools;

use function Core\Tools\truncateText;

 ?>

<!-- Variables 
    $randomUser
    $recipes
-->

<!-- User Profile Section -->
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <!-- User Info -->
    <div class="flex items-center mb-6">
        <!-- User Avatar -->
        <img
            src="../app/media/pictures/<?php echo $randomUser['user_picture'];?>"
            alt="<?php echo $randomUser['user_name']; ?>"
            class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4"
        />

        <!-- User Details -->
        <div>
            <h3 class="text-2xl font-bold"><?php echo $randomUser['user_name']; ?></h3>
            <p class="text-gray-400">Membre depuis: <?php echo $randomUser['user_creation_date']; ?></p>
            <p class="text-gray-400">Nombre de recettes postées: <?php echo $randomUser['recipe_count']; ?></p>
        </div>
    </div>

    <!-- User Actions -->
    <div class="flex justify-between items-center mb-4">
        <a
            href="#"
            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2"
        >
            Voir mes recettes
        </a>
    </div>

    <!-- User's Latest Recipes -->
    <div>
        <h4 class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
            Mes dernières recettes
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($randomUserRecipes as $recipe) : ?>
                <!-- Recipe Card (Repeat for each recipe) -->
                <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                    <img
                        src="https://source.unsplash.com/480x360/?recipe"
                        alt="<?php echo $recipe['recipe_name']; ?>"
                        class="w-full h-48 object-cover"
                    />
                    <div class="p-4">
                        <h5 class="text-lg font-bold mb-2"><?php echo $recipe['recipe_name']; ?></h5>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500 mr-1">
                                <i class="fas fa-star"></i>
                            </span>
                            <span><?php echo $recipe['recipe_avg_rating']; ?></span>
                        </div>
                        <p class="text-gray-500"><?php echo truncateText($recipe['recipe_description'],50); ?></p>
                        <a
                            href="#"
                            class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block"
                        >
                            Voir la recette
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>