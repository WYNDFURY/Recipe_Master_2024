<?php 

namespace App\Controllers\HomeController;
Use \App\Models\RecipesModel;
Use \App\Models\UsersModel;

function homeAction(\PDO $connexion) {
    include_once '../app/models/recipesModel.php';
    $popularRecipes = RecipesModel\findAllPopulars($connexion);
    $featuredRecipe = RecipesModel\featuredRecipe($connexion);
    
    include_once '../app/models/usersModel.php';
    $randomUser = UsersModel\findOneRandom($connexion);
    $randomUserRecipes = RecipesModel\findLast3ByUserId($connexion, $randomUser["user_id"]);
    

    global $title, $content;
    $title = "Homepage - Recipe Master";
    ob_start();
    include '../app/views/home/home.php';
    $content = ob_get_clean();
}
