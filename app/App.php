<?php

class App{
    private $controller, $action, $params, $conn, $controllerpath;    

    public function __construct($_conn){
        $this->controller = "home";
        $this->action = "index";
        $this->params = [];
        $this->conn = $_conn;
        $this->handleUrl();
    }
    
    public function getPath(){
        if(!empty($_SERVER['PATH_INFO'])){
        return $_SERVER['PATH_INFO'];
        }else{
            return null;
        }
    }

    public function handleUrl(){
        $path = $this->getPath();
        // turn path string into array
        $patharr=explode('/',$path);
        unset($patharr[0]);
        $patharr = array_values($patharr);
        //handle controller
        if(!empty($patharr[0])){
            $this->controller = $patharr[0];
            $this->controllerpath = ucfirst($patharr[0])."Controller";
        } else{
            $this->controllerpath = ucfirst($this->controller)."Controller";
        }
        if(file_exists("app/controllers/".$this->controllerpath.".php")){
            require_once "app/controllers/".$this->controllerpath.".php";
            if(class_exists($this->controllerpath)){
                $this->controllerpath = new $this->controllerpath($this->conn);  // tạo controller object
        }
            unset($patharr[0]);
            $patharr = array_values($patharr);
        } else {
            $this-> handleError(404) ;
            }
         //handle action
        if(!empty($patharr[0])){
            $this->action = $patharr[0];
            unset($patharr[0]);
            $patharr = array_values($patharr);
        }
        if(!empty($patharr)){
            $this->params = $patharr;
        }
        if(method_exists($this->controllerpath, $this->action)){
            call_user_func_array([$this->controllerpath, $this->action], $this->params);
        } else {
            $this->handleError(404) ;
        }
    }

    function handleError($name){
        require_once "app/views/errors/".$name.".php";
        exit();
        }
    }

?>