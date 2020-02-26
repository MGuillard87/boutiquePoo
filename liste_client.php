<?php
// On démarre la session AVANT d'écrire du code HTML
// Inclusion de la page booter.php qui va:  contenir la fonction session_start()
//Inclusion du fichier 'function.php' pour faire appel au différentes fonctions
// Inclusion de la page 'classe_liste_client_poo.php' qui va mettre en lien la page liste_client et la page classe liste client poo

include('booter.php');
include('functions.php');
include('classe_liste_client_poo.php');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Boutique</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Nos clients</h1>
                </div>
            </div>
                <?php
                // Modification du programme 'catalogue' qui affiche une liste d'articles en utilisant la classe Catalogue
                $liste_client = listeClient($bdd);
//                displayClient($liste_client);
                foreach ($liste_client->getClients() as $client){
                    displayClient($client);
                } ?>
        </div>
    </body>
</html>
