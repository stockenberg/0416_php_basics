<?php
$articles = [
    0 => [
        "id" => 1,
        "name" => "Brotkorb",
        "price" => 50.00
    ],

    1 => [
        "id" => 2,
        "name" => "Apfeltaschen",
        "price" => 35.00
    ]

];

if(isset($_GET["action"]) && $_GET["action"] === "add_cart"){
    foreach ($articles as $index => $article){
        if($article["id"] == $_GET["id"]){
            $_SESSION["cart"][$article["id"]]["name"] = $article["name"];
            $_SESSION["cart"][$article["id"]]["price"] = $article["price"];
            $_SESSION["cart"][$article["id"]]["count"] = (array_key_exists($_GET["id"], $_SESSION["cart"])) ? $_SESSION["cart"][$_GET["id"]]["count"] + 1 : 1;

            header("Location: ?p=articles");
            exit();
        }
    }
}


echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>

<?php if(isset($_GET["action"]) && $_GET["action"] === "add_cart") :  ?>
<div><h2>Artikel erfolgreich im Warenkorb</h2></div>
<?php endif; ?>

<div class="product">
    <?php foreach ($articles as $index => $article) :  ?>
        <h2><?= $article["name"] ?></h2><p><?= $article["price"] ?></p><a href="?p=articles&action=add_cart&id=<?= $article["id"] ?>">In den Warenkorb</a>
    <?php endforeach; ?>
</div>