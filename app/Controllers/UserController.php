<?php

class UserController{
    public function index(){
        $user = new Users();
        $userDetail = $user -> getAllUser();

        echo '<pre>';
        print_r($userDetail);
        echo '</pre>';
    }
}