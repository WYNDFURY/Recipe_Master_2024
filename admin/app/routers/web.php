<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['chefs'])) :
    include_once '../app/routers/users.php';

// RECIPES: ROUTER DES RECIPES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

// CATEGORIES: ROUTER DES CATEGORIES
// PATTERN: ?categories=xxx
elseif (isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';

// INGREDIENTS: ROUTER DES INGREDIENTS
// PATTERN: ?ingredients=xxx
elseif (isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';

// PATTERN: /
// CTRL: homeController
// ACTION: home
// VIEW: home/home.php
else :
    include_once '../app/controllers/homeController.php';
    \App\Controllers\HomeController\homeAction($connexion);
endif;
