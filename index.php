<?php

    require_once "app/config/config.php";
require_once "vendor/autoload.php";

error_reporting(0);

$app = new \app\classes\App();
$app->run();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?= $app->getRequestValue("p") ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="public/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="teal darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">PHP Custom CMS</a>
        <ul class="right hide-on-med-and-down">
            <?php foreach ($app->whitelist["frontend"] as $param => $page) : ?>

                <?php if ($param != "login") : ?>
                    <li><a href="?p=<?= $param ?>"><?= $page ?></a></li>
                <?php endif; ?>

            <?php endforeach; ?>


            <ul id="dropdown1" class="dropdown-content">


                <?php
                // If user is ADMIN
                if ($app->checkLoginState() && $_SESSION["active_user"]->getRole() == __ADMIN__):
                    echo "
                        <li><a href='{$_SERVER["PHP_SELF"]}?p=user-admin'>User Verwaltung</a></li>
                        <li><a href='{$_SERVER["PHP_SELF"]}?p=news-admin'>News Verwaltung</a></li>";
                endif;

                // IF user is logged in
                if ($app->checkLoginState()) :
                    echo "
                        <li><a href='{$_SERVER["PHP_SELF"]}?p=tasks'>Tasks</a></li>
                        <li><a href='{$_SERVER["PHP_SELF"]}?p=logout'>Logout</a></li>";

                // Not logged in
                else :
                    echo "<li><a href='{$_SERVER["PHP_SELF"]}?p=login'>Login</a></li>";
                endif;
                ?>
            </ul><!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin Features<i
                            class="material-icons right">arrow_drop_down</i></a></li>

        </ul>

        <ul id="nav-mobile" class="side-nav">
            <<?php foreach ($app->whitelist as $param => $page) : ?>

                <?php if ($param != "login") : ?>
                    <li><a href="?p=<?= $param ?>"><?= $page ?></a></li>
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <?= ($app->checkLoginState()) ? "<h1 class=\"header center orange-text\">Eingeloggt</h1>" : "<h1 class=\"header center orange-text\">Ausgeloggt</h1>" ?>
        <?= (\app\classes\Notice::get("error") > "") ? "<h4 class='center red-text'>" . \app\classes\Notice::get("error") . "</h4>" : "" ?>
        <div class="row center">
            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
        <div class="row center">
            <a href="http://materializecss.com/getting-started.html" id="download-button"
               class="btn-large waves-effect waves-light orange">Get Started</a>
        </div>
        <br><br>

    </div>
</div>

<main class="container">
    <?php require "pages/" . $app->getValidPage(".php", "about"); ?>
</main>

<footer class="page-footer teal darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's
                    our full time job. Any amount would help support and continue development on this project and is
                    greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="public/materialize/js/materialize.js"></script>
<script src="public/js/script.js"></script>
</body>
</html>
