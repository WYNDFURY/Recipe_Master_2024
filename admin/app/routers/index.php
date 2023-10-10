<?php
// ROUTE DES USERS
// PATTERN: ?users=xxx
// ROUTER: users
if (isset($_GET[('chefs')])) :
    include_once '../app/routers/users.php';

else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;
