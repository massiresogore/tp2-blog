<?php

namespace App\Controller;

use App\Model\newsModel;
use App\Model\NewsStorage;
use App\Service\Container;

class BlogController extends Container
{
    public function index()
    {

      $storage = new NewsStorage();
      $newsDatas = [];

      $newsData = $storage->getNews();
      
      foreach($newsData as $newData){
        $new = new NewsModel(
          $newData['idn'],
          $newData['title'],
          $newData['content'],
          $newData['author'],
          $newData['date'],
          $newData['image']
        );
        $newsDatas[] = $new;
      }

     



      return $this->getViewController()->render('home/news', ['newsDatas' => $newsDatas]);
    }

    public function ajouterNews()
    {
      
      return $this->getViewController()->render('home/news-add');
    }
    public function createNews()
    {


      if($this->getRequest()->isPost()){
        $data = $this->getRequest()->getData();



        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
         
            $uploadDir = dirname(__DIR__).'/public/images/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
            
            // // Ensure the upload directory exists
            // if (!is_dir($uploadDir)) {
            //     mkdir($uploadDir, 0777, true);
            // }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $data['image'] = $_FILES['image']['name'];

            } else {
          // Handle error
          $data['image'] = null;
            }
        } else {
            $data['image'] = null;
        }

        // Create news model
        $news = new NewsModel(
            null,
            $data['title'],
            $data['content'],
            $data['author'],
            $data['date'],
            $data['image']
        );

        var_dump($news);

        // Save news to storage
          $this->getNewsStorage()->addNews($news->getTitle(), $news->getContent(), $news->getAuthor(), $news->getDate(), $news->getImage());
        
        // Redirect to news list
        header('Location: /');
      }
    }


   
}

