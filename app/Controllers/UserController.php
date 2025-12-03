<?php

class UserController extends BaseController{
    public function index(){
        $user = new Users();
        $userDetail = $user -> getAllUser();



        $this -> renderView('users', $userDetail);
    }
}