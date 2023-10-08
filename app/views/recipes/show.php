<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <!-- Recipe Image -->
    <img
        class="w-full h-96 object-cover rounded-t-lg"
        src="<?php echo $recipeData['imageSrc']; ?>"
        alt="<?php echo $recipeData['recipeName']; ?>"
    />

    <!-- Recipe Info -->
    <div class="p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo $recipeData['recipeName']; ?></h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span><?php echo $recipeData['rating']; ?></span>
            <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i> <?php echo $recipeData['time']; ?></span>
        </div>
        <p class="text-gray-700 mb-4">
            <?php echo $recipeData['description']; ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-700 mr-2">Par <?php echo $recipeData['author']; ?></span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $recipeData['commentCount']; ?> commentaires</span>
        </div>
    </div>

    <!-- Ingredients -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
        <ul class="list-disc pl-5">
            <?php foreach ($recipeData['ingredients'] as $ingredient) : ?>
                <li><?php echo $ingredient; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Steps -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Étapes</h2>
        <ol class="list-decimal pl-5">
            <?php foreach ($recipeData['steps'] as $step) : ?>
                <li><?php echo $step; ?></li>
            <?php endforeach; ?>
        </ol>
    </div>

    <!-- Comments -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
        <?php foreach ($recipeData['comments'] as $comment) : ?>
            <!-- Comment -->
            <div class="mb-4">
                <div class="flex items-center mb-2">
                    <img
                        src="<?php echo $comment['userImage']; ?>"
                        alt="<?php echo $comment['userName']; ?>"
                        class="w-10 h-10 rounded-full mr-2"
                    />
                    <span class="font-bold"><?php echo $comment['userName']; ?></span>
                </div>
                <p class="text-gray-700">
                    <?php echo $comment['commentText']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
