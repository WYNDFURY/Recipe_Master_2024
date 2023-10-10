<?php
if (!isset($_SESSION['user'])) :
    header('location: ' . PUBLIC_ROOT . 'chefs/login');
endif;
