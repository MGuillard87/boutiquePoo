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

    // Constructeur demandant 3 paramètres

    public function __construct($idProduct, $productName, $price, $image, $description)
    {
        $this->setIdProduct($idProduct); // Initialisation de l'attribut id du produit
        $this->setProductName($productName); // Initialisation de l'attribut nom du produit
//        $this->setDescription($description); // Initialisation de l'attribut description
        $this->setPrice($price); // Initialisation de l'attribut prix
        $this->setImage($image); // Initialisation de l'attribut image
        $this->setDescription($description); // Initialisation de l'attribut image
    }
}

?>