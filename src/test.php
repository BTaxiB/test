<?php

require_once 'vendor/autoload.php';
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\CommentController;

$test = new UserController();
$data = $test->login([
    'username' => 'testusername',
    'password' => 'testpassword'
]);

echo $data;

// var_dump($data->fetch(PDO::FETCH_ASSOC));
// $test->store([
//     'name' => 'testname',
//     'email' => 'testemail',
//     'content' => 'testcontenttestcontenttestcontenttestcontenttestcontent',
//     'product_id' => 2
// ]);
// $test->update([
//     'title' => 'changed',
//     'id' => 1
// ]);

// $state = $test->index();

// while($row = $data->fetch()) {
//     echo $row['name'];
// }
// var_dump($data);

// $test->delete(1);