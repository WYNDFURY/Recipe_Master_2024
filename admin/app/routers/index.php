<?php

// ROUTE DES CATÉGORIES
if (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

// ROUTE DES USERS
// PATTERN: ?users=xxx
// ROUTER: users
elseif (isset($_GET[('users')])) :
    include_once '../app/routers/users.php';


else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;
