<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'index':
        UsersController\indexAction($connexion);
        break;
    case 'createFrom':
        UsersController\createFromAction();
        break;
    case 'logout':
        UsersController\logoutAction();
        break;
    case 'delete':
        UsersController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        UsersController\dashboardAction($connexion);
        break;
endswitch;
