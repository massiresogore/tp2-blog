<?php

namespace App\Core;


class Request{


    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getPath(){
        $path =  $_SERVER['REQUEST_URI'] ?? '/';

        $limit = '?';

        //position dans la chaine de caractère
        $position = strpos($path, $limit);

        if($position){
            $path = substr($path, 0, $position);
        }

        return $path;
    }

    public function isGet(){
        return $this->method() === 'get';
    }   
    public function isPost(){
        return $this->method() === 'post';
    }  
    
    public function getData(){
        $data = [];
        if($this->isGet()){
            foreach($_GET as $key => $value){
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->isPost()){
            foreach($_POST as $key => $value){
                $data[$key] = strip_tags($value);
            }
        }
        return $data;
    }

}