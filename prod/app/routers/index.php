<?php

if (isset($_GET['api'])) :
    include_once '../app/routers/api.php';
else :
    include_once '../app/routers/web.php';
endif;
