
<?php
// On démarre la session AVANT d'écrire du code HTML
// Inclusion de la page booter.php qui va:  contenir la fonction session_start(), faire la connection à la BDD  ET inclure les fonctions et LANCER LA BDD via un fichier pour les utiliserdans ce fichier
include('booter.php');
include('classe_panier_poo.php');

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
        <form method="post" action="commande.php">

<?php
$panier = new Panier();

if(isset($_POST['products'])){
    foreach ($_POST['products'] as $key=>$selective){
        $panier->addArticle($key);
    }
}
var_dump($panier);
