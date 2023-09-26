<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

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
