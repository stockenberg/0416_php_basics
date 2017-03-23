<?php
/**
 * Created by PhpStorm.
 * User: TobiasSchramek
 * Date: 15.03.17
 * Time: 17:32
 */

namespace app\objects;


class Tasks
{
    // task_id	task_description	task_title	task_deadline	task_done	task_created	task_sent
    private $task_id;
    //private $user_id;
    private $task_description;
    private $task_title;
    private $task_deadline;
    private $task_done;
    private $task_created;
    private $task_sent;
    private $user_id;
    private $user_name;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * @param mixed $task_id
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;
    }

    /**
     * @return mixed
     */
    public function getTaskDescription()
    {
        return $this->task_description;
    }

    /**
     * @param mixed $task_description
     */
    public function setTaskDescription($task_description)
    {
        $this->task_description = $task_description;
    }

    /**
     * @return mixed
     */
    public function getTaskTitle()
    {
        return $this->task_title;
    }

    /**
     * @param mixed $task_title
     */
    public function setTaskTitle($task_title)
    {
        $this->task_title = $task_title;
    }

    /**
     * @return mixed
     */
    public function getTaskDeadline()
    {
        return $this->task_deadline;
    }

    /**
     * @param mixed $task_deadline
     */
    public function setTaskDeadline($task_deadline)
    {
        $this->task_deadline = $task_deadline;
    }

    /**
     * @return mixed
     */
    public function getTaskDone()
    {
        return $this->task_done;
    }

    /**
     * @param mixed $task_done
     */
    public function setTaskDone($task_done)
    {
        $this->task_done = $task_done;
    }

    /**
     * @return mixed
     */
    public function getTaskCreated()
    {
        return $this->task_created;
    }

    /**
     * @param mixed $task_created
     */
    public function setTaskCreated($task_created)
    {
        $this->task_created = $task_created;
    }

    /**
     * @return mixed
     */
    public function getTaskSent()
    {
        return $this->task_sent;
    }

    /**
     * @param mixed $task_sent
     */
    public function setTaskSent($task_sent)
    {
        $this->task_sent = $task_sent;
    }

    /**
     * @return string
     */
    public function getUserId() : string
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }




}

$task = new Tasks();
