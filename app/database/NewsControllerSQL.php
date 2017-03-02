<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 17:01
 */

namespace app\database;


use app\classes\News;
use app\interfaces\NewsControllerSQLInterface;
use app\traits\DB;

class NewsControllerSQL implements NewsControllerSQLInterface
{

    /**
     * @return array
     */
    public static function getAllNews()
    {
        $SQL = "SELECT * FROM news ORDER BY news_created DESC ";

        return DB::GETObjArr($SQL, array(), "\\app\\classes\\News");
    }

    public static function deleteNews(int $id)
    {
        // TODO: Implement deleteNews() method.
    }

    public static function getNewsById(int $id)
    {
        // TODO: Implement getNewsById() method.
    }

    public static function insertNews(News $news)
    {
        $SQL = "INSERT INTO news (news_author_id, news_text, news_title, news_image) 
                VALUES (:news_author_id, :news_text, :news_title, :news_image)";

        $execArr = [
            ":news_author_id" => $news->getNewsAuthorId(),
            ":news_text" => $news->getNewsText(),
            ":news_title" => $news->getNewsTitle(),
            ":news_image" => $news->getNewsImage()
        ];

        DB::SET($SQL, $execArr);
    }

    public static function updateNews(News $news)
    {
        // TODO: Implement updateNews() method.
    }


}