<?php

require_once "app/classes/App.php";
$app = new App();
$app->run();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $app->getRequestValue("p") ?></title>
</head>
<body>

    <header>
        <nav>
            <?php foreach (scandir("pages") as $id => $filename) :?>

                <?php $page = explode(".", $filename)[0]; ?>

                <a href="?p=<?= $page ?>"><?= $page ?></a>

            <?php endforeach; ?>
        </nav>
    </header>

    <main>
        <?php require "pages/" . $app->getValidPage(".php", "about"); ?>
    </main>

    <footer>

    </footer>
</body>
</html>