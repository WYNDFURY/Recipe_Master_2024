<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

// BOOKS: ROUTER DES BOOKS
// PATTERN: ?books=xxx
elseif (isset($_GET['books'])) :
    include_once '../app/routers/books.php';

// AUTHORS.: ROUTER DES AUTHORS
// PATTERN: ?authors=xxx
elseif (isset($_GET['authors'])) :
    include_once '../app/routers/authors.php';

// PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else :
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
