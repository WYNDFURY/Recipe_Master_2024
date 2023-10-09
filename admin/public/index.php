<?php
// DISPATCHER CENTRAL

// 1. Charge l'initiateur
require_once '../core/init.php';

// 2. Charge le routeur principal
require_once '../app/routers/index.php';

// 3. Charge le template
if (!isset($_GET['api'])) :
    require_once '../app/views/templates/index.php';
endif;
