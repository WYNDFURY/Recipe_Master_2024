<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion);
    global $title, $content;
    $title = "List of ingredients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}

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