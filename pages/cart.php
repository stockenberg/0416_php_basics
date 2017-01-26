
<h1>Dein Warenkorb</h1>
<table>
    <?php $sum = 0;
        foreach ($_SESSION["cart"] as $id => $article) :  ?>
        <tr>
            <td><?= $article["name"] ?> (<?= $article["count"] ?>x)</td>
            <td><?= number_format($article["price"] * $article["count"], "2", ",", ".") ?> €</td>
        </tr>
        <?php $sum += $article["price"] * $article["count"]; ?>
    <?php endforeach; ?>
    <tr>
        <td style="padding-top: 20px;">MwSt: <?= number_format($sum * 0.19, "2", ",", ".") ?> €</td>
    </tr>
    <tr>
        <td>Gesamt: <?= number_format($sum, "2", ",", ".") ?> €</td>
    </tr>
</table>