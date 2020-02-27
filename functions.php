<?php

// fonction qui affiche un catalogue
//function displayCat($catalogue)
//{
//   foreach($catalogue->getArticle() as $article)
//   {
//       displayArticle($article);
//   }
//}

function displayCat1(Catalogue $catalogue)
{
//    var_dump($catalogue->getArticles());
//    var_dump($catalogue->getShoe());
//    var_dump($catalogue->getClothing());
//die;
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
    echo 'bonjour';
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



//********************************                           FONCTIONS CALCULS                    *****************************************************************

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



