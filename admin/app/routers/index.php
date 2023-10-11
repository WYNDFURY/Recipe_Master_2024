<?php
// ROUTE DES USERS
// PATTERN: ?users=xxx
// ROUTER: users

if (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

elseif (isset($_GET[('comments')])) :
    include_once '../app/routers/comments.php';

elseif (isset($_GET[('ratings')])) :
    include_once '../app/routers/ratings.php';    

elseif (isset($_GET[('recipes')])) :
    include_once '../app/routers/recipes.php';

elseif (isset($_GET[('ingredients')])) :
    include_once '../app/routers/ingredients.php';

elseif (isset($_GET[('users')])) :
    include_once '../app/routers/users.php';

else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;
