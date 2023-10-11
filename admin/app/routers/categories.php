<?php

use \App\Controllers\CategoriesController;


include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'update':
        CategoriesController\updateAction();
        break;
    case 'createFrom':
        CategoriesController\createFromAction();
        break;
    case 'create':
        CategoriesController\createAction($connexion, $_POST);
        break;
    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
