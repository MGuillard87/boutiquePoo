<?php
// On démarre la session AVANT d'écrire du code HTML
// Inclusion de la page booter.php qui va:  contenir la fonction session_start()
//Inclusion du fichier 'function.php' pour faire appel au différentes fonctions
// Inclusion de la page 'classe_catalogue_poo.php' qui va mettre en lien le catalogue et la page classe Catalogue


include('booter.php');
include('functions.php');
include('classe_catalogue_poo.php');
include('classe_article_poo.php');
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
                    <h1>Boutique</h1>
                </div>
            </div>
            <form method="post" action="panier.php">

                <?php
                // Modification du programme 'catalogue' qui affiche une liste d'articles en utilisant la classe Catalogue
                $catalogue = listeArticles($bdd);
                displayCat($catalogue);
                ?>
                <div class="row-12 align-self-center" >
                    <input type="submit" value="commander"/>
                </div>
            </form>
        </div>
    </body>
</html>
