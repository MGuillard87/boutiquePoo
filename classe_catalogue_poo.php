<?php
class Catalogue {
    private $article = [];

    // Constructeur demandant 1 paramètres

    public function __construct($productName, $price, $image, $description)
    {
        $this->setProductName($productName); // Initialisation de l'attribut nom du produit
        $this->setDescription($description); // Initialisation de l'attribut description
        $this->setPrice($price); // Initialisation de l'attribut prix
        $this->setImage($image); // Initialisation de l'attribut image
    }

}