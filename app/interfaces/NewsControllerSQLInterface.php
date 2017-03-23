<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 16:57
 */

namespace app\interfaces;


use app\objects\News;

interface NewsControllerSQLInterface
{

    public static function getAllNews();

    public static function deleteNews(int $id);

    public static function getNewsById(int $id);

    public static function insertNews(News $news);

    public static function updateNews(News $news);



}