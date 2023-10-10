<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['chefs']):
    case 'logout':
        UsersController\logoutAction();
        break;
    default:
        UsersController\dashboardAction($connexion);
        break;
endswitch;
