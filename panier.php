<?php
// On démarre la session AVANT d'écrire du code HTML
// Inclusion de la page booter.php qui va:  contenir la fonction session_start(), faire la connection à la BDD  ET inclure les fonctions et LANCER LA BDD via un fichier pour les utiliserdans ce fichier
include('booter.php');
include('functions.php');
include('classe_catalogue_poo.php');
include('classe_article_poo.php');
include('classe_panier_poo.php');
if (!empty($panier)) {
    $_SESSION = $panier;
}
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
                    <h1>Panier</h1>
                </div>
            </div>
            <form method="post" action="panier.php">

<?php

$panier = new Panier();
$sumTotal = 0;
if (isset($_POST['products']) AND !empty($_POST['products'])) {
    foreach ($_POST['products'] as $key => $selective) {
        $panier->addArticle($key);
    }
    var_dump($panier);
}
//var_dump($_POST['quantities']);
if (isset($_POST['quantities']) AND !empty($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $key => $selective) {
        $panier->updateArticle($key, $selective );

    }

}

if (isset($_POST['delete']) AND !empty($_POST['delete'])) {
    foreach ($_POST['delete'] as $key => $selective) {
        $panier->deleteArticle($key);

    }

}



foreach ($panier->getTabPanier() as $key=>$articles) {
    $idDentique = $bdd->query('SELECT * FROM product WHERE idProduct=' . $key);
    while ($productBasket = $idDentique->fetch()) {
        // apppel de la fonction permettant de retourner le total du panier
//        if (isset($_POST['quantities'][$productBasket['idProduct']])) {
//            $quantiProduct = $_POST['quantities'][$productBasket['idProduct']];
//        } else {
//            $quantiProduct = 0;
//        }
        $priceProduct = $productBasket['price'];
        $sumTotal = totalPanier($sumTotal, $priceProduct, $articles)// le calcul se fait avec une fonction
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
                <input type="hidden" name="products[<?php echo $key ?>]" id="case"
                       value=""/>
                <input type="number" name="quantities[<?php echo $key ?>]" min=1
                       value="<?php echo $articles ?>"/><br>
                <label for="case">Quantité</label>
                <div class="col-sm-12 ">
                    <input type="submit" name="delete[<?php echo $key ?>]" value="Supprimer cet article"/>
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
                        <input type="submit" value="Modifier la commande"/>
                    </div>
                </div>
            </form>

            <form method="post" action="panier.php">
                <div class="row">
                    <div class="col-sm-12 ">
                        <input type="submit" value="confirmer la commande"/>
                    </div>
                </div>
            </form>


    </body>
</html>


