<?php

Use App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

if (isset($_GET['ingredients'])) {
    switch ($_GET['ingredients']):
        case 'show':
        include_once '../app/controllers/ingredientsController.php';
            IngredientsController\showAction($connexion, $_GET['id']);
            break;
        default:
    endswitch;
}
