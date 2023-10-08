<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "All Recipes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
