<?php

Use App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

if (isset($_GET['categories'])) {
    switch ($_GET['categories']):
        case 'show':
        include_once '../app/controllers/categoriesController.php';
            CategoriesController\showAction($connexion, $_GET['id']);
            break;
        default:
    endswitch;
}
