<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';
    $recipes = CategoriesModel\findAllByCategoryId($connexion, $id);
    global $title, $content;
    $title = "All Recipes of cateogry " . $recipes[0]['category_name'] ;
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}