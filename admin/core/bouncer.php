<?php
if (!isset($_SESSION['user'])) :
    header('location: ' . PUBLIC_ROOT . 'users/login');
endif;
