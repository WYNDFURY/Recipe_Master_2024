<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'add':
        RecipesController\addAction();
        break;
    case 'create':
        RecipesController\createAction($connexion, $_POST);
        break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
