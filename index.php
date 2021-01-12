<?php
require_once './views/layouts/header.php';

session_start();

?>
<?php
if (isset($_SESSION['user_id'])) {
?>
    <a href="/?login" class="btn btn-info">Login</a>
    <a href="/?register" class="btn btn-warning">Register</a>
<?php
}

switch ($_GET) {
    // case isset($_GET['logout']):
    //     session_start();
    //     session_destroy();
    //     break;

    case isset($_GET['login']):
        require_once 'views/user/login.php';
        break;

    case isset($_GET['register']):
        require_once 'views/user/register.php';
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
