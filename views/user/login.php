<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="username">username</label>
    <input type="text" name="username" class="form-control">

    <label for="password">Password</label>
    <input type="text" name="password" class="form-control">

    <input type="submit" value="Login">
</form>

<?php
$status = '';
if ($_POST) {
    $user_id = $adminCtrl->login([
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ]);

    if ($user_id) {
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");
        exit();
    }
}

switch ($status) {
    case 'success':
        echo "<h1>Registered succesfully";
        header("Location: /?login");
        break;

    case 'error':
        echo "Passwords don't match";
        break;

    default:
        # code...
        break;
}
