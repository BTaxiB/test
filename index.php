<?php
require_once './views/layouts/header.php';

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

    case isset($_GET['products']):
        require_once 'views/product/index.php';
        break;

    case isset($_GET['catalog']):
        require_once 'views/product/catalog.php';
        break;

    case isset($_GET['create_product']):
        require_once 'views/product/create.php';
        break;

    case isset($_GET['show_product']) && isset($_GET['id']):
        require_once 'views/product/show.php';
        break;

    case isset($_GET['delete_product']) && isset($_GET['id']):
        require_once 'views/product/delete.php';
        break;

    default:
        break;
}

require_once './views/layouts/footer.php';
