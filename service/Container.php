<?php

namespace App\Service;

use App\Controller\ViewController;
use App\Core\Request;
use App\Model\News\NewsStorage;
use App\Model\Users\UsersStorage;

abstract class Container
{
    private ?Request $request = null;
    private ?ViewController $viewController = null;
    private ?NewsStorage $newsStorage = null;
    private ?UsersStorage $usersStorage = null;
    


    public function getRequest(): Request
    {
        if ($this->request === null) {
            $this->request = new Request();
        }
        return $this->request;
    }

    public function getViewController(): ViewController
    {
        if ($this->viewController === null) {
            $this->viewController = new ViewController();
        }
        return $this->viewController;
    }

    public function getNewsStorage(): NewsStorage
    {
        if ($this->newsStorage === null) {
            $this->newsStorage = new NewsStorage();
        }
        return $this->newsStorage;
    }

    public function renderBeautiful($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
      }


      //cree une fonction qui enregistrer la session
        public function setSession($key, $value){
            $_SESSION[$key] = $value;
        }
        //cree une fonction qui recupere la session
        public function getSession($key){
            return $_SESSION[$key];
        }

        public function getUsersStorage(): UsersStorage
        {
            if ($this->usersStorage === null) {
                $this->usersStorage = new UsersStorage();
            }
            return $this->usersStorage;
        }

        public function auth(){
            if(isset($_SESSION['user'])){
                header('Location: /');
              }        
        }
   
}