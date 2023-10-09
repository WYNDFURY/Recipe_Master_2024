<?php
session_start();

// 1. Charge les paramètres
require_once '../app/config/params.php';

// 2. Charge les constantes
require_once '../core/constantes.php';

// 3. Charge du videur
require_once '../core/bouncer.php';

// 4. Charge la connexion
require_once '../core/connexion.php';

// 5. Charge les Tools
require_once '../core/tools.php';
