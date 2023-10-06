<?php

Use App\Controllers\RecipesController;

include_once '../app/controllers/RecipesController.php';

if (isset($_GET['recipes'])) {
    switch ($_GET['recipes']):
        case 'show':
            include_once '../app/controllers/recipesController.php';
            RecipesController\showAction($connexion, $_GET['id']);
            break;

        default:
            include_once '../app/controllers/recipesController.php';
            RecipesController\indexAction($connexion);
            break;
    endswitch;
}
