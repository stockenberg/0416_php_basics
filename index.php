<?php
session_name("php_test");
session_start();
session_regenerate_id();




    define("_BASE_", $_SERVER["PHP_SELF"]);
    define("_URL_", $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"]);



    require "app/config/config.php";


    $whitelist = ["startseite" => "Startseite", "about" => "Über Mich", "contact" => "Kontakt", "articles" => "Artikel", "cart" => "Warenkorb"];
 
    function validPage(){
        global $whitelist;
        if(isset($_GET["p"])){
            if(array_key_exists($_GET["p"], $whitelist)){
                $page = $_GET["p"];
            }else{
                $page = "startseite";
            }
        }else{
            $page = "startseite";
        }
        if(file_exists("pages/".$page.".php")){
            return "pages/".$page.".php";

        }else{
            return "pages/404.php";
        }

    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $whitelist[$_GET["p"]] ?></title>
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
        <?php require validPage(); ?>
    </main>

    <footer>

    </footer>
</body>
</html>