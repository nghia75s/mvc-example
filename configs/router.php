<?php

class Router{
    protected $routers = [];

    public function get($url, $action){
        $this->routers['GET'][$url] = $action;
    }

    public function post($url, $action){
        $this->routers['POST'][$url] = $action;
    }

    public function getRouters(){
        return $this->routers;
    }

    public function processPath($method, $url){
        $url = $url ?: '/'; // Default to '/' if URL is empty
        if(isset($this->routers[$method][$url])){
            $action = $this->routers[$method][$url];
            [$controller, $function] = explode('@', $action); //Filename = Classname
            require_once './app/Controllers/' . $controller . '.php';
            $controllerOne = new $controller();
            $controllerOne -> $function();
        }else{
            echo "404 Not Found";
        }
    }
}