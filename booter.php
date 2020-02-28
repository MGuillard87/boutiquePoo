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


