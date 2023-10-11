<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'update':
        IngredientsController\updateAction();
        break;
    case 'createFrom':
        IngredientsController\createFromAction();
        break;
    case 'create':
        IngredientsController\createAction($connexion, $_POST);
        break;
    case 'delete':
        IngredientsController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        IngredientsController\indexAction($connexion);
        break;
endswitch;
