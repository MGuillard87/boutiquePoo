<?php


class Catalogue {

    private $articles = [];
    private $shoes = [];
    private $clothings = [];

    // Liste des getters

    public function getArticles()
    {
        return $this->articles;
    }

    public function getShoe()
    {
        return $this->shoes;
    }

    public function getClothing()
    {
        return $this->clothings;
    }

    // Liste des setters

    public function setArticle($article): void
    {
        $this->articles[] = $article;
    
    }

    public function setShoe($shoe): void
    {
        $this->shoes[] = $shoe;
    }

    public function setClothing($clothing): void
    {
        $this->clothings[] = $clothing;
    }

}


