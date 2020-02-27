<?php

class Article
{
    private $idProduct;
    private $productName;
    private $description;
    private $price;
    private $image;
    private $weight;
    private $stock;
    private $availability;

    // Liste des getters

    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    // Liste des setters

    public function setIdProduct($idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function setAvailability($availability): void
    {
        $this->availability = $availability;
    }

    // Constructeur demandant 5 paramètres

    public function __construct($idProduct, $productName, $price, $image, $description)
    {
        $this->setIdProduct($idProduct); // Initialisation de l'attribut id du produit
        $this->setProductName($productName); // Initialisation de l'attribut nom du produit
        $this->setPrice($price); // Initialisation de l'attribut prix
        $this->setImage($image); // Initialisation de l'attribut image
        $this->setDescription($description); // Initialisation de l'attribut image

    }

}


// Notre classe Vêtement hérite des attributs et méthodes de Article.

class Vetement extends Article
{
    private $clothingSize;

    // Liste des getters

    public function getClothingSize()
    {
        return $this->clothingSize;
    }

    // Liste des setters

    public function setClothingSize($clothingSize): void
    {
        $this->clothingSize = $clothingSize;
    }

    // Constructeur demandant 6 paramètres (toujours en premier)
    public function __construct($idProduct, $productName, $price, $image, $description, $clothingSize)
    {
        parent::__construct($idProduct, $productName, $price, $image, $description);
        $this->setClothingSize($clothingSize); // Initialisation de l'attribut taille de vêtement
    }


}

// Notre classe Chaussure hérite des attributs et méthodes de Article.

class Chaussure extends Article
{

    private $shoesSize;

    // Liste des getters

    public function getShoesSize()
    {
        return $this->shoesSize;
    }

    // Liste des setters

    public function setShoesSize($shoesSize): void
    {
        $this->shoesSize = $shoesSize;
    }


// Constructeur demandant 6 paramètres (toujours en premier)
    public function __construct($idProduct, $productName, $price, $image, $description, $shoesSize)
    {
        parent::__construct($idProduct, $productName, $price, $image, $description);
        $this->setShoesSize($shoesSize); // Initialisation de l'attribut taille de chaussure
    }

}

?>