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

     



      return $this->getViewController()->render('home/news-list', ['newsDatas' => $newsDatas]);
    }

    public function newsList()
    {

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $newsData = $this->getNewsStorage()->getNewsById($id);
        
            $new = new NewsModel(
              $newsData['idn'],
              $newsData['title'],
              $newsData['content'],
              $newsData['author'],
              $newsData['date'],
              $newsData['image']
            );
      }

     
      return $this->getViewController()->render('home/news-view', ['new' => $new]);
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

    public function deleteNews()
    {
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $this->getNewsStorage()->deleteNews($id);
       header('Location: /');
      }
    }

    public function editNews()
    {
      $newsToUpdateData = null;
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $newsData = $this->getNewsStorage()->getNewsById($id);
        $newsToUpdate = new NewsModel(
          $newsData['idn'],
          $newsData['title'],
          $newsData['content'],
          $newsData['author'],
          $newsData['date'],
          $newsData['image']
        );
      }
     
      return $this->getViewController()->render('home/news-add', ['newsToUpdate' => $newsToUpdate]);
    }

    public function createEditNews(){
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $newsData = $this->getNewsStorage()->getNewsById($id);
        if ($this->getRequest()->isPost()) {
          $data = $this->getRequest()->getData();

  
          // Handle image upload
          if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = dirname(__DIR__).'/public/images/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
              $data['image'] = $_FILES['image']['name'];
            } else {
              $data['image'] = $newsData['image'];
            }
          } else {
            $data['image'] = $newsData['image'];
          }

          // Update news model
          $news = new NewsModel(
            $newsData['idn'],
            $data['title'],
            $data['content'],
            $data['author'],
            null,
            $data['image']
          );

          // var_dump($news);
          // die();

          // Save updated news to storage
          $this->getNewsStorage()->updateNews($news->getIdn(), $news->getTitle(), $news->getContent(), $news->getAuthor(), $news->getDate(), $news->getImage());

           $_SESSION['message'] = 'News updated successfully';

          // Redirect to news list


          header('Location: /news/edit?id='.$news->getIdn());

        }

            
      }


    }


   
}

