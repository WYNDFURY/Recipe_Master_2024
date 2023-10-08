<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\IngredientsModel;
use \App\Models\CommentsModel;

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

function showAction(\PDO $connexion, $id)
{
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($connexion, $id);
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAllIngredientsByRecipeId($connexion, $recipe['recipe_id']);
    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAllByRecipeId($connexion, $recipe['recipe_id']);
    

    global $title, $content;
    $title = $recipe['recipe_name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}
