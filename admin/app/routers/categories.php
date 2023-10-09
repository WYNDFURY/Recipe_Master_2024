<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addAction();
        break;
    case 'create':
        CategoriesController\createAction($connexion, $_POST);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
