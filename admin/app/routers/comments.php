<?php

use \App\Controllers\CommentsController;

include_once '../app/controllers/commentsController.php';

switch ($_GET['comments']):
    case 'add':
        CommentsController\addAction();
        break;
    case 'create':
        CommentsController\createAction($connexion, $_POST);
        break;
    default:
        CommentsController\indexAction($connexion);
        break;
endswitch;
