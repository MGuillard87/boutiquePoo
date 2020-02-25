<?php
$liste_articles = [
    ["image" => "chapeau_chat.jpg", "name" => "Chapeau", "price" => 10],
    ["image" => "pull_cerf.jpg", "name" => "Pull", "price" => 5],
    ["image" => "nounours.jpg", "name" => "Nounours", "price" => 1500]
];

class Article
{
    private $productName;
    private $description;
    private $price;
    private $image;
    private $weight;
    private $stock;
    private $availability;

    // Liste des getters

    public function getProductName()
    {
        return $this->productName;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    // Liste des setters

    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function setAvailability($availability): void
    {
        $this->availability = $availability;
    }

    // Constructeur demandant 1 paramètres

    public function __construct($productName, $price, $image)
    {
        $this->setProductName($productName); // Initialisation de l'attribut nom du produit
//        $this->setDescription($description); // Initialisation de l'attribut description
        $this->setPrice($price); // Initialisation de l'attribut prix
        $this->setImage($image); // Initialisation de l'attribut image
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
            <?php echo '<h1><strong>' . htmlspecialchars($article->getProductName()) . '</strong>' . '</h1>';
//            echo '<p>' . htmlspecialchars($article->getDescription()) . '</p>'; ?>
        </div>

        <div class="col align-self-center"">
        <?php echo '<p>' . htmlspecialchars($article->getPrice()) . ' euros' . '<p>'?>
        </div>
    </div>
<?php
}


foreach ($liste_articles as $produits) {
    $article = new Article($produits['name'], $produits['price'], $produits['image']);
    displayArticle($article);
}

?>