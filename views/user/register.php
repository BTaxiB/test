<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="username">username</label>
    <input type="text" name="username" class="form-control">

    <label for="password">Password</label>
    <input type="text" name="password" class="form-control">

    <label for="confirm_password">Confirm Password</label>
    <input type="text" name="confirm_password" class="form-control">

    <input type="submit" value="Register">
</form>

<?php
$status = '';
if ($_POST) {
    if ($_POST['password'] === $_POST['confirm_password']) {
        $adminCtrl->register([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);
        $status = 'success';
    } else {
        $status = 'error';
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
