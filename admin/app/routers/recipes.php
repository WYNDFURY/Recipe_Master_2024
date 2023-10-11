<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'update':
        RecipesController\updateAction($connexion, $_GET['id'],[
            'name' => $_POST['name'],
            'chef_id' => $_POST['chef'],
            'category_id' => $_POST['category'],
            'description' => $_POST['description'],
        ], $_POST['ingredients']);
        break;
    case 'updateForm':
        RecipesController\updateFormAction($connexion, $_GET['id']);
        break;   
    case 'createForm':
        RecipesController\createFormAction($connexion);
        break;
    case 'create':
        RecipesController\createAction($connexion, [
            'name' => $_POST['name'],
            'chef_id' => $_POST['chef'],
            'category_id' => $_POST['category'],
            'description' => $_POST['description'],
        ], $_POST['ingredients']);
        break;
    case 'delete':
        RecipesController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
