<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    require_once 'views/user/login.php';
}