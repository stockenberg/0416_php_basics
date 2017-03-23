<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 17:01
 */

namespace app\database;


use app\objects\News;
use app\interfaces\NewsControllerSQLInterface;
use app\traits\DB;

class NewsControllerSQL implements NewsControllerSQLInterface
{

    use DB;

    /**
     * @return array
     */
    public static function getAllNews()
    {
        $SQL = "SELECT * FROM news ORDER BY news_created DESC ";

        return DB::GETObjArr($SQL, array(), "\\app\\objects\\News");
    }

    public static function deleteNews(int $id)
    {
        $SQL = "DELETE FROM news WHERE news_id = :id";
        $execArr = [":id" => $id];

        DB::SET($SQL, $execArr);
    }

    public static function getNewsById(int $id)
    {
        $SQL = "SELECT * FROM news WHERE news_id = :id";

        $execArr = [":id" => $id];

        return DB::GETObj($SQL, $execArr, "\\app\\objects\\News");
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
        $SQL = "UPDATE news 
                SET news_author_id = :news_author_id, news_title = :news_title, news_text = :news_text, news_image = :news_image 
                WHERE news_id = :news_id";

        $execArr = [
            ":news_author_id" => $news->getNewsAuthorId(),
            ":news_text" => $news->getNewsText(),
            ":news_title" => $news->getNewsTitle(),
            ":news_image" => $news->getNewsImage(),
            ":news_id" => $news->getNewsId()
        ];

        DB::SET($SQL, $execArr);
    }


}