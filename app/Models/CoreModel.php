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

    public function insert($table, $data = []){
        $fields = implode(",", array_keys($data));
        $placeholders = implode(",", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";

        $stm = $this->conn->prepare($sql);
        return $stm->execute(array_values($data));
    }

    public function update($table, $data = [], $where = []){
        $setPart = implode(" = ?, ", array_keys($data)) . " = ?";
        $wherePart = implode(" = ? AND ", array_keys($where)) . " = ?";

        $sql = "UPDATE $table SET $setPart WHERE $wherePart";

        $stm = $this->conn->prepare($sql);
        $values = array_merge(array_values($data), array_values($where));
        return $stm->execute($values);
    }

    public function delete($table, $where = []){
        $wherePart = implode(" = ? AND ", array_keys($where)) . " = ?";
        
        $sql = "DELETE FROM $table WHERE $wherePart";
        
        $stm = $this->conn->prepare($sql);
        return $stm->execute(array_values($where));
    }
}
