<?php
namespace App\Model\News;


class NewsModel
{
 

    public function __construct(
        private $idn,
        private $title,
        private $content,
        private $author,
        private $date,
        private $image,
        )
    {}

    public function getIdn()
    {
        return $this->idn;
    }

    public function setIdn($idn)
    {
        $this->idn = $idn;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
