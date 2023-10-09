<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;
use \App\Models\RecipesModel;


function indexAction(\PDO $connexion)
{
    include_once '../app/models/usersModel.php';
    $chefs = UsersModel\findAll($connexion);

    global $title, $content;
    $title = "All Chefs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, $id)
{
    include_once '../app/models/usersModel.php';
    $chef = UsersModel\findOneById($connexion, $id);
    include_once '../app/models/recipesModel.php';
    $user_recipes = RecipesModel\findAllByUserId($connexion, $id);

    global $title, $content;
    $title = "Profile of " . $chef['chef_name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}

function loginFormAction()
{

    global $title, $content;
    $title = "Connexion";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}

function loginAction(\PDO $connexion, $data)
{
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneByPseudo($connexion, $data);

    if ($user && password_verify($data['password'], $user['password'])) :
        // Je sais qu'iel peut entrer
        // Je lui crée une variable de session
        $_SESSION['user'] = $user;
        header('location: ' . ADMIN_ROOT);
    else :
        header('location: ' . PUBLIC_ROOT . 'users/login/form');
    endif;
}
