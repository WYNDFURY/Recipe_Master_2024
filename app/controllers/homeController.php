<?php 

namespace App\Controllers\HomeController;

function homeAction(\PDO $connexion) {
    include_once '../app/models/recipesModel.php';
    $popularRecipes = \App\Models\recipesModel\findAllPopulars($connexion);
    $featuredRecipe = \App\Models\recipesModel\featuredRecipe($connexion);


    global $title, $content;
    $title = "Homepage - Recipe Master";
    ob_start();
    include '../app/views/home/index.php';
    $content = ob_get_clean();
}
