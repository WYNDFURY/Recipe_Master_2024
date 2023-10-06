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

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $recipe['dish_name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}