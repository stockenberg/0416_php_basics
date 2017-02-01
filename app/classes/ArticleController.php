<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 18:52
 */

require "Article.php";

class ArticleController
{

    public $articles;

    public function createArticles(){

        $brotkorb = new Article();
        $brotkorb->setId(1);
        $brotkorb->setName("Brotkorb");
        $brotkorb->setPrice(50);

        $apfeltasche = new Article();
        $apfeltasche->setId(2);
        $apfeltasche->setName("Apfeltasche");
        $apfeltasche->setPrice(35);

        $this->articles[] = $brotkorb;
        $this->articles[] = $apfeltasche;

    }


    public function addToCart()
    {
        if (isset($_GET["action"]) && $_GET["action"] === "add_cart") {

            foreach ($this->articles as $index => $article) {
                if ($article->getId() == $_GET["id"]) {

                    $_SESSION["cart"][$article->getId()]["name"] = $article->getName();
                    $_SESSION["cart"][$article->getId()]["price"] = $article->getPrice();
                    $_SESSION["cart"][$article->getId()]["count"] = (array_key_exists($_GET["id"], $_SESSION["cart"])) ? $_SESSION["cart"][$_GET["id"]]["count"] + 1 : 1;

                    header("Location: ?p=articles&completed");
                    exit();
                }
            }

        }
    }


}