<?php
// Inclusion de la page 'classe_article_poo.php' qui va mettre en lien la classe Article et la classe Catalogue
include('classe_article_poo.php');

class Catalogue {

    private $articles = [];

    // Liste des getters

    public function getArticles()
    {
        return $this->articles;
    }

    // Liste des setters

    public function setArticle($article): void
    {
        $this->articles[] = $article;
    }

}


