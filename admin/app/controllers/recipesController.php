<?php
namespace App\Controllers\RecipesController;

Use Core\Tools;

use function App\Models\IngredientsModel\deleteAllIngredientsByRecipeId;
use function Core\Tools\explodeArrayOfArrays;

use \App\Models\RecipesModel;
use \App\Models\IngredientsModel;
use \App\Models\CategoriesModel;
use \App\Models\UsersModel;
include_once '../app/models/recipesModel.php';
include_once '../app/models/ingredientsModel.php';
include_once '../app/models/categoriesModel.php';
include_once '../app/models/usersModel.php';

function indexAction(\PDO $connexion)
{
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "All Recipes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}


// UPDATE FUNCTIONS

function updateAction(\PDO $connexion, $id, $data, $ingredients)
{
    
    IngredientsModel\deleteAllIngredientsByRecipeId($connexion, $id);
    
    RecipesModel\addRecipeIngredients($connexion, $id, $ingredients);

    RecipesModel\updateRecipe($connexion, $id, $data);

    
    header('location: ' . ADMIN_ROOT  . 'recipes');
    exit();
}

function updateFormAction(\PDO $connexion, $id)
{
    $chefs = usersModel\findAll($connexion);
    $categories = CategoriesModel\findAll($connexion);
    $recipe = RecipesModel\findOneById($connexion, $id);
    $selected_array = IngredientsModel\findAllIngredientsByRecipeId($connexion, $id);
    $ingredients = IngredientsModel\findAll($connexion);

    // transforme $selected_array qui est un array of array en un unique array d'id
    $selected_id = array_column($selected_array, 'ingredient_id');

    global $title, $content;
    $title = "Update of " . $recipe['recipe_name'];
    ob_start();
    include '../app/views/recipes/updateForm.php';
    $content = ob_get_clean();
}


// DELETE FUNCTIONS

function deleteAction(\PDO $connexion, int $id) : void
{
    RecipesModel\deleteCommentsByRecipeId($connexion, $id);

    RecipesModel\deleteRatingsByRecipeId($connexion, $id);

    RecipesModel\deleteDHIByRecipeId($connexion, $id);

    RecipesModel\deleteRecipe($connexion, $id);
    header('location: ' . ADMIN_ROOT  . 'recipes');
}


// CREATE FUNCTIONS

function createFormAction(\PDO $connexion)
{
    $chefs = usersModel\findAll($connexion);
    $categories = CategoriesModel\findAll($connexion);
    $ingredients = IngredientsModel\findAll($connexion);

    global $title, $content;
    $title = "Creation of a new recipe";
    ob_start();
    include '../app/views/recipes/createForm.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, $data, $ingredients)
{
    RecipesModel\createRecipe($connexion, $data);
    RecipesModel\addNewRecipeIngredients($connexion, $ingredients);

    header('location: ' . ADMIN_ROOT  . 'recipes');
}