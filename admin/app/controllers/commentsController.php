<?php

namespace App\Controllers\CommentsController;

use \App\Models\CommentsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAll($connexion);
    global $title, $content;
    $title = "List of comments";
    ob_start();
    include '../app/views/comments/index.php';
    $content = ob_get_clean();
}

