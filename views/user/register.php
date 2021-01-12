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
if ($_POST) {
    // if ($_POST['password'] === $_POST['confirm_password']) {
        $adminCtrl->register([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);
        header("Location: /?login");
    // } else {
        // echo "Passwords don't match";
    // }
}
