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


//Nhúng hết file .php có trong folder
foreach(glob(__DIR__.'\configs\*.php') as $file) {
    require_once $file;
}

foreach(glob(__DIR__.'\core\*.php') as $file) {
    require_once $file;
}

foreach(glob(__DIR__.'\app\Models\*.php') as $file) {
    require_once $file;
}

foreach(glob(__DIR__.'\app\Controllers\*.php') as $file) {
    require_once $file;
}

$router = new Router();

foreach(glob(__DIR__.'\routers\*.php') as $file) {
    require_once $file;
}

$projectName = 'mvc';
$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUrl = str_replace('/'.$projectName, '', $requestUrl); //Remove /mvc from URL
$method = $_SERVER['REQUEST_METHOD'];
$router -> processPath($method, $requestUrl);