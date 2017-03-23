<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 16:13
 */

namespace app\objects;


class News
{

    private $news_id;
    private $news_author_id;
    private $news_title;
    private $news_text;
    private $news_image;
    private $news_created;

    /**
     * @return mixed
     */
    public function getNewsId()
    {
        return $this->news_id;
    }

    /**
     * @param mixed $news_id
     */
    public function setNewsId($news_id)
    {
        $this->news_id = $news_id;
    }

    /**
     * @return mixed
     */
    public function getNewsAuthorId()
    {
        return $this->news_author_id;
    }

    /**
     * @param mixed $news_author_id
     */
    public function setNewsAuthorId($news_author_id)
    {
        $this->news_author_id = $news_author_id;
    }

    /**
     * @return mixed
     */
    public function getNewsTitle()
    {
        return $this->news_title;
    }

    /**
     * @param mixed $news_title
     */
    public function setNewsTitle($news_title)
    {
        $this->news_title = $news_title;
    }

    /**
     * @return mixed
     */
    public function getNewsText()
    {
        return $this->news_text;
    }

    /**
     * @param mixed $news_text
     */
    public function setNewsText($news_text)
    {
        $this->news_text = $news_text;
    }

    /**
     * @return mixed
     */
    public function getNewsImage()
    {
        return $this->news_image;
    }

    /**
     * @param mixed $news_image
     */
    public function setNewsImage($news_image)
    {
        $this->news_image = $news_image;
    }

    /**
     * @return mixed
     */
    public function getNewsCreated()
    {
        return $this->news_created;
    }

    /**
     * @param mixed $news_created
     */
    public function setNewsCreated($news_created)
    {
        $this->news_created = $news_created;
    }



}