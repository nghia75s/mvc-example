<?php

class UserController extends BaseController{
    public function index(){
        $user = new Users();
        $userDetail = $user -> getAllUser();
        ob_start();
        $this -> renderView('layouts-part/users', $userDetail);
        $data = [
            'contents' => ob_get_clean() //luu thong tin view vao bien data
        ];

        $this -> renderView('layouts/main-layout', $data);
    }

    public function index2(){
        $user = new Groups();
        $userDetail = $user -> getAllGroup();
        ob_start();
        $this -> renderView('layouts-part/users', $userDetail);
        $data = [
            'content' => ob_get_clean() //luu thong tin view vao bien data
        ];

        $this -> renderView('layouts/main-layout', $data);
    }
}