<?php
class Panier
{

    private $tabPanier = [];

//add : qui admet en paramètre un id article, et qui crée la ligne de Panier avec une quantité à 1 si l’article n’est pas déjà présent dans le Panier, ou qui rajoute 1/
// à la quantité correspondante si l’article est déjà présent dans le Panier.

    public function addArticle($idProduct)
    {
        if (!isset($tabPanier[$idProduct])) {      // Quantité = 1 si l'article n'est pas déjà présent dans le Panier
            $this->tabPanier[$idProduct] = 1;

        } else { // Quantité de base = +1 si l'article est déjà présent dans le Panier
            $this->tabPanier[$idProduct] += 1;
        }
    }

    //qui admet en paramètre un id article et une quantité, et qui rajoute cette quantité à la ligne de panier correspondant à l’article.

    public function updateArticle($idProduct, $quantity)
    {
//        if (isset($tabPanier[$idProduct]) AND !empty($tabPanier[$idProduct])) {
            $this->tabPanier[$idProduct] = $quantity;
//        }
    }

    //qui admet en paramètre un id article, et qui supprime la ligne de Panier correspondante

    public function deleteArticle($idProduct)
    {
//        if (isset($tabPanier[$idProduct]) AND !empty($tabPanier[$idProduct])) {
          unset($this->tabPanier[$idProduct]);
//        }
    }

    // Liste des getters
public function getTabPanier(){
    return $this->tabPanier;
}

    // Liste des setters


}

