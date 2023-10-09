<?php

namespace App\Controllers\ingredientsController;

use \App\Models\ingredientsModel;

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/ingredientsModel.php';
    $recipes = IngredientsModel\findAllByIngredientId($connexion, $id);
    global $title, $content;
    $title = "All Recipes containing " . $recipes[0]['ingredient_name'] ;
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();
}