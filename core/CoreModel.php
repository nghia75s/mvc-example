<?php

class CoreModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::connectPDO();
    }

    // Truy vấn nhiều dòng dữ liệu
    public function getAll($sql){
        @$stm = $this -> conn -> prepare($sql);
        @$stm -> execute();
        $result = $stm -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Đếm số dòng trả về
    public function getRow($sql){
        @$stm = $this -> conn -> prepare($sql);
        @$stm -> execute();
        return $stm -> rowCount();
    }

    public function insert($table, $data){
        $keys = array_keys($data);
        $cot = implode(", ", $keys);
        $place = ':'.implode(', :', $keys);
        $sql = "INSERT INTO $table ($cot) VALUES ($place)";
        $stm = $this->conn->prepare($sql);
        return $stm->execute($data);
    }

    public function update($table, $data, $condition){
        $update = "";
        foreach($data as $key => $value){
            $update .= "$key = :$key, ";
        }
        $update = rtrim($update, ", ");
        $sql = "UPDATE $table SET $update WHERE id = $condition";
        $stm = $this->conn->prepare($sql);
        return $stm->execute($data);
    }

    public function delete($table, $condition){
        $sql = "DELETE FROM $table WHERE id = ".$condition;
        $stm = $this->conn->prepare($sql);
        return $stm->execute( );
    }
}
