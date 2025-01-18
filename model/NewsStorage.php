<?php

namespace App\Model;

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

    // public function getNewsById($id)
    // {
    //     $sql = 'SELECT * FROM news WHERE idn = :id';
    //     $query = $this->pdo->prepare($sql);
    //     $query->execute(['id' => $id]);
    //     $news = $query->fetch();
    //     return $news;
    // }

    public function addNews($title, $content, $author, $date, $image):bool
    {
        $sql = 'INSERT INTO news (title, content, author, date, image) VALUES (:title, :content, :author, :date, :image)';
        $query = Db::getInstance()->prepare($sql);
        $stm = $query->execute(['title' => $title, 'content' => $content, 'author' => $author, 'date' => $date, 'image' => $image]);
        return $stm;
    }

    // public function updateNews($id, $title, $content, $author, $date, $image)
    // {
    //     $sql = 'UPDATE news SET title = :title, content = :content, author = :author, date = :date, image = :image WHERE idn = :id';
    //     $query = $this->pdo->prepare($sql);
    //     $query->execute(['id' => $id, 'title' => $title, 'content' => $content, 'author' => $author, 'date' => $date, 'image' => $image]);
    // }

    // public function deleteNews($id)
    // {
    //     $sql = 'DELETE FROM news WHERE idn = :id';
    //     $query = $this->pdo->prepare($sql);
    //     $query->execute(['id' => $id]);
    // }

}