<?php

use \App\Controllers\RatingsController;

include_once '../app/controllers/RatingsController.php';

switch ($_GET['ratings']):
    case 'update':
        RatingsController\updateAction();
        break;
    case 'createFrom':
        RatingsController\createFromAction();
        break;
    case 'create':
        RatingsController\createAction($connexion, $_POST);
        break;
    case 'delete':
        RatingsController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        RatingsController\indexAction($connexion);
        break;
endswitch;
