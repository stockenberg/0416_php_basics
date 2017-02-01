<?php if (isset($_GET["completed"])) : ?>
    <div>
        <h2>Artikel erfolgreich im Warenkorb</h2>
    </div>
<?php endif; ?>

<div class="product">
    <?php foreach ($app->content->articles as $index => $article) : ?>
        <h2><?= $article->getName(); ?></h2><p><?= $article->getPrice(); ?></p><a
                href="?p=articles&action=add_cart&id=<?= $article->getId(); ?>">In den Warenkorb</a>
    <?php endforeach; ?>
</div>