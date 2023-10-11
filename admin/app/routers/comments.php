<?php

use \App\Controllers\CommentsController;

include_once '../app/controllers/commentsController.php';

switch ($_GET['comments']):
    case 'update':
        CommentsController\updateAction();
        break;
    case 'createFrom':
        CommentsController\createFromAction();
        break;
    case 'create':
        CommentsController\createAction($connexion, $_POST);
        break;
    case 'delete':
        CommentsController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        CommentsController\indexAction($connexion);
        break;
endswitch;
