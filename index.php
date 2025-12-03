<?php
require_once './configs/config.php';
require_once './configs/database.php';
require_once './app/Models/CoreModel.php';
require_once './app/Models/Users.php';
require_once './app/Models/Group.php';

$user = new Users();

$data = [
    'username' => 'admin',
    'email' => 'admin',
    'password' => 'admin',
];

echo '<pre>';
print_r($user -> updateUser( $data , 4));
echo '</pre>';

echo '<pre>';
print_r($user -> getAllUser());
echo '</pre>';