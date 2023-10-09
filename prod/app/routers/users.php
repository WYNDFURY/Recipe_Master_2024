<?php

use App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['chefs']):

    case 'show':
        UsersController\showAction($connexion, $_GET['id']);
        break;
    case 'loginForm':
        UsersController\loginFormAction();
        break;

    case 'login':
        UsersController\loginAction($connexion, [
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password']
        ]);
        break;
    default:
        include_once '../app/controllers/recipesController.php';
        UsersController\indexAction($connexion);
        break;

endswitch;
