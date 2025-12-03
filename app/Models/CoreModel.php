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

    public function update($table, $data = []){
        $setClause = "";
        foreach ($data as $key => $value) {
            $setClause .= "$key = ?, ";
        }
        $setClause = rtrim($setClause, ", ");

        $sql = "UPDATE $table SET $setClause WHERE id = ?";

        $stm = $this->conn->prepare($sql);
        $values = array_values($data);
        $values[] = $data['id']; // Assuming 'id' is part of $data for the WHERE clause
        return $stm->execute($values);
    }
}
