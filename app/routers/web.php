<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

// BOOKS: ROUTER DES RECIPES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';
    var_dump("fdsfdsf");

// PATTERN: /
// CTRL: homeController
// ACTION: home
// VIEW: home/home.php
else :
    include_once '../app/controllers/homeController.php';
    \App\Controllers\HomeController\homeAction($connexion);
endif;
