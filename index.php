<?php

/*
    luồng chạy
    1. load index.php
    2. load router.php (xủ lý url điều hướng)
    3. gọi controller của url
    4. xử lý logic trong controller
    5. gọi model để lấy dữ liệu (thêm, sửa, xóa)
    6. trả về dữ liệu cho controller
    7. controller gọi view để hiển thị dữ liệu
    8. view hiển thị dữ liệu ra trình duyệt
*/

require_once './configs/config.php';
require_once './configs/database.php';
require_once './app/Models/CoreModel.php';
require_once './app/Models/Users.php';
require_once './app/Models/Group.php';
require_once './app/Controllers/BaseController.php';
require_once './app/Controllers/UserController.php';

// $user = new Users();

// $data = [
//     'username' => 'user',
//     'email' => 'admin',
//     'password' => 'lamo',
// ];

// echo '<pre>';
// print_r($user -> deleteUser($data, 11));
// echo '</pre>';

// echo '<pre>';
// print_r($user -> getAllUser());
// echo '</pre>';

$controller = new UserController();
$controller->index();