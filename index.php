<?php
require_once './configs/config.php';
require_once './configs/database.php';
require_once './app/Models/CoreModel.php';
require_once './app/Models/Users.php';
require_once './app/Models/Group.php';

$user = new Users();

$data = [
    'username' => 'user',
    'email' => 'admin',
    'password' => 'lamo',
];

echo '<pre>';
print_r($user -> deleteUser($data, 11));
echo '</pre>';

echo '<pre>';
print_r($user -> getAllUser());
echo '</pre>';