<?php

session_start();


switch ($_GET) {
    case isset($_GET['signed_in']):
        $_SESSION['user_id'] = $_GET['code'];
        break;
    case isset($_GET['login_err']):
        
        break;

    case isset($_GET['logout']):
        session_start();
        session_destroy();
        break;

    default:
        if (!isset($_SESSION['user_id'])) {
            require_once 'views/user/login.php';
        }
        break;
}
