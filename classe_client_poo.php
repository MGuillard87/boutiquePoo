<?php
class Client
{
//    private $idClient;
    private $firstName;
    private $name;
    private $address;
    private $CP;
    private $city;

    // Liste des getters

//    public function getIdClient()
//    {
//        return $this->idClient;
//    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCP()
    {
        return $this->CP;
    }

    public function getCity()
    {
        return $this->city;
    }

    // Liste des setters

//    public function setIdClient($idClient): void
//    {
//        $this->idClient = $idClient;
//    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function setCP($CP): void
    {
        $this->CP = $CP;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }


    // Constructeur demandant 3 paramètres

    public function __construct($firstName, $name, $address, $CP, $city)
    {
//        $this->setIdClient($idClient); // Initialisation de l'attribut id du produit
        $this->setFirstName($firstName); // Initialisation de l'attribut nom du produit
//        $this->setDescription($description); // Initialisation de l'attribut description
        $this->setName($name); // Initialisation de l'attribut prix
        $this->setAddress($address); // Initialisation de l'attribut image
        $this->setCP($CP); // Initialisation de l'attribut image
        $this->setCity($city); // Initialisation de l'attribut image
    }
}
