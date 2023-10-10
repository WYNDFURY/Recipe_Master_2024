<?php

namespace App\Controllers\CommentsController;

use \App\Models\CommentsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAll($connexion);
    global $title, $content;
    $title = "List of comments";
    ob_start();
    include '../app/views/comments/index.php';
    $content = ob_get_clean();
}

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