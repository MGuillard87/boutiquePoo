<?php

// Fonction qui affiche la liste des articles
function listeArticles($bdd)
{
//Création d'objets catalogue
    $catalogue = new Catalogue();
    $requestCatalogue = $bdd->query('SELECT product.idProduct, productName, price, image, description, shoeSize, clothingSize  
                                    from `product`
                                    LEFT OUTER JOIN shoes ON product.idProduct = shoes.idProduct
                                    LEFT OUTER JOIN clothing ON product.idProduct = clothing.idProduct
                                    LIMIT 1,3');
    while ($donnees = $requestCatalogue->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
// Création d'objets articles, shoe et vetement
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
    return $catalogue;
}




// Création d'objet pa Fonction qui affiche le panier
function displayPanier($panier, $bdd)
{
    try {
        if (isset($_POST) AND !empty($_POST)) {
            var_dump($_POST);
            $sumTotal = 0;
            foreach ($_POST['products'] as $key => $selective) {
                $idDentique = $bdd->query('SELECT * FROM product WHERE idProduct=' . $key);
                while ($productBasket = $idDentique->fetch()) {
                    // apppel de la fonction permettant de retourner le total du panier
                    if (isset($_POST['quantities'][$productBasket['idProduct']])) {
                        $quantiProduct = $_POST['quantities'][$productBasket['idProduct']];
                    } else {
                        $quantiProduct = 0;
                    }
                    $priceProduct = $productBasket['price'];
                    $sumTotal = totalPanier($sumTotal, $priceProduct, $quantiProduct)// le calcul se fait avec une fonction
                    ?>
                    <div class="row panier">
                        <div class="col align-self-center">
                            <img src="images/<?php echo htmlspecialchars($productBasket['image']); ?>" width="300"
                                 class="rounded corners img-fluid" alt="produit du panier ">
                        </div>

                        <div class="col align-self-center">
                            <h2><?php echo $productBasket['productName'];; ?></h2>
                        </div>

                        <div class="col align-self-center">
                            <h2><?php echo $productBasket['price'] . " euros"; ?> </h2>
                        </div> <?php

                        ?>
                        <div class="col align-self-center">
                            <input type="hidden" name="products[<?php echo $productBasket['idProduct'] ?>]" id="case"
                                   value=""/>
                            <input type="number" name="quantities[<?php echo $productBasket['idProduct'] ?>]" min=1
                                   value="<?php echo $quantiProduct ?>"/><br>
                            <label for="case">Quantité</label>
                            <div class="col-sm-12 ">
                                <input type="submit" value="Supprimer cet article"/>
                            </div>
                        </div>
                    </div>
                    <?php
                    $idDentique->closeCursor();
                }
            }
            // Affichage du total panier
            ?>
            <div class="row">
                <div class="col-sm-12 ">
                    <h1>Total commande: <?php echo($sumTotal); ?> euros</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 ">
                    <input type="submit" value="confirmer la commande"/>
                </div>
            </div>
            </form>
            </body>
            </html>
            <?php
        }
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
}

// Fonction qui affiche le catalogue
function displayCat(Catalogue $catalogue)
{

    foreach ($catalogue->getArticles() as $article) {
        displayArticle($article);
    }
    foreach ($catalogue->getShoe() as $shoe) {
        displayShoe($shoe);
    }

    foreach ($catalogue->getClothing() as $clothing) {
        displayClothing($clothing);
    }
}


//fonction qui affiche 1 vêtement
function displayClothing(Vetement $clothings) {
    ?>
    <div class="row">
        <div class="col">
            <img src="images/<?php echo htmlspecialchars($clothings->getImage()) ; ?>"  width="300" class="rounded corners img-fluid" alt="produit à vendre ">
        </div>

        <div class="col align-self-center">
            <?php echo '<h2><strong>' . htmlspecialchars($clothings->getProductName()) . '</strong>' . '</h2>';
            echo '<p>' . htmlspecialchars($clothings->getDescription()) . '</p>'; ?>
        </div>

        <div class="col align-self-center"">
        <?php echo '<p>' . htmlspecialchars($clothings->getPrice()) . ' euros' . '<p>'?>
        <?php echo '<p>' . 'Taille disponible: '. htmlspecialchars($clothings->getClothingSize()) .'</p>'; ?>
        </div>

        <div class="col align-self-center"">
        <input type="checkbox"  name="products[<?php echo $clothings->getIdProduct()?>]"/> <label for="case"></label>

        </div>

    </div>
    <?php
}

//fonction qui affiche 1 chaussure
function displayShoe(Chaussure $shoes) {
    ?>
    <div class="row">
        <div class="col">
            <img src="images/<?php echo htmlspecialchars($shoes->getImage()) ; ?>"  width="300" class="rounded corners img-fluid" alt="produit à vendre ">
        </div>

        <div class="col align-self-center">
            <?php echo '<h2><strong>' . htmlspecialchars($shoes->getProductName()) . '</strong>' . '</h2>';
            echo '<p>' . htmlspecialchars($shoes->getDescription()) . '</p>'; ?>
        </div>

        <div class="col align-self-center"">
            <?php echo '<p>' . htmlspecialchars($shoes->getPrice()) . ' euros' . '<p>'?>
            <?php echo '<p>' . 'Taille disponible: '. htmlspecialchars($shoes->getShoesSize()) .'</p>'; ?>
        </div>

        <div class="col align-self-center"">
            <input type="checkbox"  name="products[<?php echo $shoes->getIdProduct()?>]"/> <label for="case"></label>

        </div>

    </div>

   <?php
}

//fonction qui affiche 1 article
function displayArticle($article)
{
    ?>

    <div class="row">
        <div class="col">
            <img src="images/<?php echo htmlspecialchars($article->getImage()) ; ?>"  width="300" class="rounded corners img-fluid" alt="produit à vendre ">
        </div>

        <div class="col align-self-center">
            <?php echo '<h2><strong>' . htmlspecialchars($article->getProductName()) . '</strong>' . '</h2>';
                        echo '<p>' . htmlspecialchars($article->getDescription()) . '</p>'; ?>
        </div>

        <div class="col align-self-center"">
        <?php echo '<p>' . htmlspecialchars($article->getPrice()) . ' euros' . '<p>'?>
        </div>

        <div class="col align-self-center"">
            <input type="checkbox"  name="products[<?php echo $article->getIdProduct()?>]"/> <label for="case"></label>
        </div>
    </div>

    <?php

}




//********************************                           FONCTIONS CALCULS                    ****************************************************************
// fonction qui retourne le total du panier et affiche ce total
function totalPanier($sumTotal, $prixProduit, $quantiProduit)
{
    return $sumTotal + $prixProduit* ($quantiProduit=intval($quantiProduit)) ;
}

// fonction qui affiche une liste de clients
function displayClients($listeClients)
{
    foreach($listeClients->getclients() as $client)
    {
        displayArticle($client);
    }
}




                      /**********************************************************************************************************************************************************************************************************/

//fonction qui affiche 1 client
function displayClient($client)
{
    ?>

    <div class="row">
        <div class="col">
            <?php echo '<p>' . htmlspecialchars($client->getFirstName()). ' </br>' .htmlspecialchars($client->getName()) . '</strong>' .'</p>' ?>
        </div>

        <div class="col align-self-center"">
        <?php echo '<p>' . htmlspecialchars($client->getAddress()) . '<p>'?>
        </div>

        <div class="col align-self-center">
            <?php echo '<p>' . htmlspecialchars($client->getCity()) . ' '. htmlspecialchars($client->getCP()). '</p>'; ?>
        </div>
    </div>

    <?php

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

