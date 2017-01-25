<?php

// PHP STUFF
// ?page=article_edit&action=insert


    require "app/config/config.php";
    $whitelist = ["startseite" => "Startseite", "about" => "Über Mich", "contact" => "Kontakt"];

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

    <main>
        <?php require validPage(); ?>
    </main>

    <footer>

    </footer>
</body>
</html>