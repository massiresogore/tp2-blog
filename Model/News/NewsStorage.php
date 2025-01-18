<?php

namespace App\Model\News;

use App\Core\Db;

class NewsStorage 


{

    public function __construct()
    {
    }

    public function getNews()
    {
        $sql = 'SELECT * FROM news';
        $query = Db::getInstance()->query($sql);
        $news = $query->fetchAll();
        return $news;
    }

    public function getNewsById($id)
    {
        $sql = 'SELECT * FROM news WHERE idn = :id';
        $query = DB::getInstance()->prepare($sql);
        $query->execute(['id' => $id]);
        $news = $query->fetch();
        return $news;
    }

    public function addNews($title, $content, $author, $date, $image):bool
    {
        $sql = 'INSERT INTO news (title, content, author, date, image) VALUES (:title, :content, :author, now(), :image)';
        $query = Db::getInstance()->prepare($sql);
        $stm = $query->execute(['title' => $title, 'content' => $content, 'author' => $author, 'image' => $image]);
        return $stm;
    }

    public function updateNews($id, $title, $content, $author, $date, $image)
    {
        $sql = 'UPDATE news SET title = :title, content = :content, author = :author, date = :date, image = :image WHERE idn = :id';
        $query = Db::getInstance()->prepare($sql);
        $query->execute(['id' => $id, 'title' => $title, 'content' => $content, 'author' => $author, 'date' => $date, 'image' => $image]);
    }

    public function deleteNews($id)
    {
         $uploadDir = dirname(__DIR__).'/public/images/';
        $sql = 'DELETE FROM news WHERE idn = :id';
        $query = DB::getInstance()->prepare($sql);
        $news = $this->getNewsById($id);
        if ($news && file_exists($uploadDir . $news['image'])) {
            unlink($uploadDir . $news['image']);
        }
        $query->execute(['id' => $id]);
    }

    public function getNewsByNewDate()
    {
        $sql = 'SELECT * FROM news ORDER BY date DESC';
        $query = Db::getInstance()->query($sql);
        $news = $query->fetchAll();
        return $news;
    }

    




}


