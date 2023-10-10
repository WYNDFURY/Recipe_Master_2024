<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'add':
        IngredientsController\addAction();
        break;
    case 'create':
        IngredientsController\createAction($connexion, $_POST);
        break;
    default:
        IngredientsController\indexAction($connexion);
        break;
endswitch;
