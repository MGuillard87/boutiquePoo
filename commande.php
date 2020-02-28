<?php
// On démarre la session AVANT d'écrire du code HTML
// Inclusion de la page booter.php qui va:  contenir la fonction session_start(), faire la connection à la BDD  ET inclure les fonctions et LANCER LA BDD via un fichier pour les utiliser dans ce fichier
include('booter.php');

// créer quelques variables de session dans $_SESSION

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
            <h1>récapitulatif de commande</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1></h1>
        </div>
    </div>

    <?php
    $sumTotal = 0;
    if (!empty($panier)) { ?>
        <?php
        foreach ($panier['products'] as $key => $selective) {
            $idDentique = $bdd->query('SELECT * FROM product WHERE idProduct=' . $key);
            while ($productBasket = $idDentique->fetch()) {

                if (isset($panier['quantities'][$productBasket['idProduct']])) {
                    $quantiProduct = $_SESSION['quantities'][$productBasket['idProduct']];
                } else {
                    $quantiProduct = 0;
                }
                $productName = $productBasket['productName'];
                $priceProduct = $productBasket['price'];

                // apppel de la fonction permettant de retourner le total du panier
                $sumTotal = totalPanier($sumTotal, $priceProduct, $quantiProduct)
                ?>

                <div class="row panier">
                    <div>
                        <p><?php echo "Vous avez commandé ".$quantiProduct." ".$productName. " à ". $priceProduct;?></p>
                    </div>
                </div>

                <?php
            }
        } ?>
                <div class="row panier">
                    <div>
                        <p><?php echo "Le total de votre commande est de ". $sumTotal. " euros"; ?> </p>
                    </div>
                </div>


</body>
</html>




