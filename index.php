<?php
require_once './configs/config.php';
require_once './configs/database.php';
require_once './app/Models/CoreModel.php';
require_once './app/Models/Users.php';
require_once './app/Models/Group.php';

$user = new Groups();

$data = [
    'name' => 'student',
];

echo '<pre>';
print_r($user -> getAllGroup());
echo '</pre>';
