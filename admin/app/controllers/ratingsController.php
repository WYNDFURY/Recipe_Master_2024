<?php

namespace App\Controllers\RatingsController;

use \App\Models\RatingsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/ratingsModel.php';
    $ratings = ratingsModel\findAll($connexion);
    global $title, $content;
    $title = "List of ratings";
    ob_start();
    include '../app/views/ratings/index.php';
    $content = ob_get_clean();
}
