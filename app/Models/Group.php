<?php

class Groups extends CoreModel{
    public function __construct(){ 
        parent::__construct();
    }

    public function getAllGroup(){
        return $this -> getAll("SELECT * FROM groups");
    }

    public function insertGroup($data){
        return  $this -> insert("groups", $data);
    }

    public function updateGroups($data, $id){
        return $this -> update("groups", $data, $id);
    }

    public function deleteGroup($id){
        return $this -> delete("groups", $id);
    }
}