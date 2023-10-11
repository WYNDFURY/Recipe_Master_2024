<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;
include_once '../app/models/categoriesModel.php';

function indexAction(\PDO $connexion)
{
    $categories = CategoriesModel\findAll($connexion);
    global $title, $content;
    $title = "List of categories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function updateAction(\PDO $connexion, $id, $name, $description)
{
    CategoriesModel\updateCategory($connexion, $id, $name, $description);

    header("Location: /categories");
    exit();
}

function deleteAction(\PDO $connexion, int $id) : void
{
    CategoriesModel\deleteCommentsByCategoryId($connexion, $id);

    CategoriesModel\deleteRatingsByCategoryId($connexion, $id);

    CategoriesModel\deleteDHIByCategoryId($connexion, $id);

    CategoriesModel\deleteDishesByCategoryId($connexion, $id);

    CategoriesModel\deleteCategory($connexion, $id);
    header('location: ' . ADMIN_ROOT  . 'categories');
}

function createAction(\PDO $connexion, $id, $name, $description)
{
    CategoriesModel\createCategory($connexion, $id, $name, $description);
    include_once '../app/views/categories/create.php';
}