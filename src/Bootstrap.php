<?php

require_once 'vendor/autoload.php';

// Error Handling
ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set("error_reporting", E_ALL);

// Timezone - http://php.net/manual/en/timezones.php
date_default_timezone_set('Europe/London');

//Controllers
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\CommentController;

$productCtrl = new ProductController();
$adminCtrl = new UserController();
$commentCtrl = new CommentController();
