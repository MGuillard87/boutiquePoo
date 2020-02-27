<?php
//********************************                           FONCTIONS SESSION                   *****************************************************************

// Je crée une page booter.php qui va contenir la fonction session_start() et que je vais inclure à l’aide de 'include' ou 'require' dans les pages voulues d’un site.
session_start();

//********************************                           FONCTIONS BDD                  *****************************************************************

// fonction qui permet de se connecter à MySQL

function connectionBdd()
{
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=datashop;charset=utf8', 'root', '@lex1987');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
$bdd = connectionBdd();


// Fonction qui affiche la liste des articles
function listeArticles($bdd)
{
//    $articles = array();
//Création d'objets catalogue
    $catalogue = new Catalogue();
    $requestCatalogue = $bdd->query('SELECT product.idProduct, productName, price, image, description, shoeSize, clothingSize  
                                    from `product`
                                    LEFT OUTER JOIN shoes ON product.idProduct = shoes.idProduct
                                    LEFT OUTER JOIN clothing ON product.idProduct = clothing.idProduct');
    while ($donnees = $requestCatalogue->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
// Création d'objets articles
        if ($donnees['shoeSize'] !== NULL){
            $shoe = new Chaussure($donnees["idProduct"],$donnees["productName"], $donnees["price"], $donnees["image"], $donnees["description"], $donnees["shoeSize"]);
            // stocker shoe dans catalogue
            $catalogue->setShoe($shoe);
        }
        elseif ($donnees['clothingSize'] !== NULL){
            $cloth = new Vetement($donnees["idProduct"],$donnees["productName"], $donnees["price"], $donnees["image"], $donnees["description"], $donnees["clothingSize"]);
            // stocker clothing dans catalogue
            $catalogue->setClothing($cloth);
        }
        else{
            $art = new Article($donnees["idProduct"],$donnees["productName"], $donnees["price"], $donnees["image"], $donnees["description"]);
            // stocker article dans catalogue
            $catalogue->setArticle($art);
        }

    }
//    var_dump($catalogue);die;
    return $catalogue;
}



//Fonction qui affiche la liste des clients
function listeClient($bdd)
{
//    $clients = array();
//Création d'objets liste client
    $listeClient = new ListeClient();
    $requestListeClient = $bdd->query('SELECT firstName, name, address, CP, city FROM client');
    while ($donnees = $requestListeClient->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
// Création d'objets client
        $client = new Client($donnees["firstName"], $donnees["name"], $donnees["address"], $donnees["CP"], $donnees["city"]);
// stocker client dans liste client
        $listeClient->setClients($client);

    }
    return $listeClient;
}

?>