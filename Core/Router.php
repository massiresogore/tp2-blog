<?php
namespace App\Core;
class Router{

    protected array $routes = [];
    protected Request $request;


    public function __construct()
    {
        $this->request = new Request();
    }
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }


    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            echo '404 - Page not found';
            header('location: /');
            exit;
        }


       //Si CallBack est un tableau
       if(is_array($callback)){
        $callback[0] = new $callback[0];
       }
       
        return call_user_func($callback);
    }
}