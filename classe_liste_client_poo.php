<?php
// Inclusion de la page 'classe_article_poo.php' qui va mettre en lien la classe Article et la classe Catalogue
include('classe_client_poo.php');

class ListeClient {

    private $clients = [];

    // Liste des getters

    public function getClients()
    {
        return $this->clients;
    }

    // Liste des setters

    public function setClients($clients): void
    {
        $this->clients[] = $clients;
    }

}