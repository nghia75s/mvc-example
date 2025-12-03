<?php

class Database{
    private static $conn;

    public static function connectPDO(){
        try{
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //hỗ trợ tiếng việt
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //đẩy lỗi vào ngoại lệ
        );

        $dsn = _DRIVER.":host="._HOST.";dbname="._DB;
        
        self::$conn = new PDO($dsn, _USER, _PASS, $options);
        
        } catch (Exception $ex){
        }

        return self::$conn;
    }
}