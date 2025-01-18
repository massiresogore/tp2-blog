<?php

namespace App\Service;

use App\Controller\ViewController;
use App\Core\Request;
use App\Model\NewsStorage;

abstract class Container
{
    private ?Request $request = null;
    private ?ViewController $viewController = null;
    private ?NewsStorage $newsStorage = null;
    


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
   
}