<?php

// fonction qui affiche un catalogue
function displayCat($catalogue)
{
   foreach($catalogue->getArticles() as $article)
   {
       displayArticle($article);
   }
}

// fonction qui affiche une liste de clients
function displayClients($listeClients)
{
    foreach($listeClients->getclients() as $client)
    {
        displayArticle($client);
    }
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



//********************************                           FONCTIONS CALCULS                    *****************************************************************

// fonction qui retourne le total du panier et affiche ce total
function totalPanier($sumTotal, $prixProduit, $quantiProduit)
{
    return $sumTotal + $prixProduit* ($quantiProduit=intval($quantiProduit)) ;
}

?>