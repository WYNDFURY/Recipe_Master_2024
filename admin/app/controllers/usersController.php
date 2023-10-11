<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;


function indexAction(\PDO $connexion)
{
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($connexion);

    global $title, $content;
    $title = "All users";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function dashboardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Dashboard";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}

function logoutAction()
{
    // On tue la variable de session 'user'
    unset($_SESSION['user']);
    // On redirige vers le site public (PUBLIC_ROOT)
    header('Location: ' .  PUBLIC_ROOT);
}
