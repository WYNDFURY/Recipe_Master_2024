<?php

use Core\Tools;

use function Core\Tools\Slugify;

?>

<section>
    <h2 class="text-2xl font-bold mb-4">All chefs</h2>
    <?php foreach ($chefs as $chef) : ?>
        <div class="flex items-center mb-6">
            <!-- User Avatar -->
            <img src="../app/media/pictures/<?php echo $chef['chef_picture'];?>" alt="<?php echo $chef['chef_name']; ?>" class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

            <!-- User Details -->
            <div>
                <h3 class="text-2xl font-bold"><?php echo $chef['chef_name']; ?></h3>
                <p class="text-gray-400">Membre depuis: <?php echo $chef['chef_creation_date']; ?></p>
                <p class="text-gray-400">Nombre de recettes postées: <?php echo $chef['chef_recipe_count']; ?></p>
            </div>
        </div>

        <!-- User Actions -->
        <div class="flex justify-between items-center mb-4">
            <a href="chefs/<?php echo $chef['chef_id']?>/<?php echo Slugify($chef['chef_name'])?>" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">
                Voir mes recettes
            </a>
        </div>
    <?php endforeach; ?>
</section>