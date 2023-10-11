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
