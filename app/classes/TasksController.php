<?php
/**
 * Created by PhpStorm.
 * User: TobiasSchramek
 * Date: 15.03.17
 * Time: 17:28
 */

namespace app\classes;

use app\database\TasksControllerSQL;
use app\traits\DB;

class TasksController extends Controller
{
    private $unanssignedTasks;
    private $anssignedTasks;
    private $request;

    public function run()
    {
        $this->getTasks();
        $this->request = array_merge($_GET, $_POST);

        if (isset($this->request["action"])) {
            switch ($this->request["action"]) {

                case "edit":

                    break;

                case "delete":
                    $this->deleteTask($_GET['taskId']);
                    break;

                case "insert":
                    $this->createTask($_POST);
                    break;

                case 'finish':
                    $this->finishTask($_GET['taskId']);
                    break;

            }
        }
    }

    public function runInsert()
    {
        if (isset($_GET['action']) && $_GET['action'] == 'insert') {
            $this->createTask($_POST);
        }
    }


    public function getTasks()
    {
        $taskControllerSQL = new TasksControllerSQL();
        //$taskControllerSQL->getAssignedTasks();
        $this->unanssignedTasks = $taskControllerSQL->getUnassignedTasks();
        $this->assignedTasks = $taskControllerSQL->getAssignedTasks();


        /*
        echo '<pre>';
        print_r($this->unanssignedTasks);
        echo '</pre>';
        */
    }

    //------------------------------------------------------------------------------------------------------------------------
    // create getTaskObjectList
    public static function getTaskObjectList()
    {
        $result = array();
        $taskControllerSQL = new TasksControllerSQL();

        $unassigned = $taskControllerSQL->getUnassignedTasks();
        $assigned = $taskControllerSQL->getAssignedTasks();

        foreach ($unassigned as $item => $value) {
            $task = new Tasks();
            $task->setTaskId($value['task_id']);
            $task->setTaskTitle($value['task_title']);
            $task->setTaskDescription($value['task_description']);
            $task->setTaskDeadline($value['task_deadline']);

            $result['unassigned'][] = $task;
        }

        foreach ($assigned as $item => $value) {
            $task = new Tasks();
            $task->setTaskId($value['task_id']);
            $task->setTaskTitle($value['task_title']);
            $task->setTaskDescription($value['task_description']);
            $task->setTaskDeadline($value['task_deadline']);
            $task->setUserName($value["user_username"]);

            $result['assigned'][] = $task;
        }

        return $result;
    }
    //------------------------------------------------------------------------------------------------------------------------
    // create Task
    public function createTask($post)
    {
        echo '<pre>';
        print_r($post);
        echo '</pre>';
        if (isset($post["submit"])) {
            $task = new Tasks();

            $task->setTaskTitle($post['task_title']);
            $task->setTaskDescription($post['task_description']);
            $task->setTaskDeadline($post['task_deadline']);

            $task->setUserId($post['user_id']);// assigned - usertasks table

            $sql = 'INSERT INTO tasks (task_title, task_description, task_deadline) VALUES (:task_title, :task_description, :task_deadline)';
            $execArray = [
                ':task_title' => $task->getTaskTitle(),
                ':task_description' => $task->getTaskDescription(),
                ':task_deadline' => date("y-m-d H:i:s", strtotime($task->getTaskDeadline()))
            ];

            DB::SET($sql, $execArray);

            if ($post['user_id'] > 0) {

                $sql2 = 'SELECT task_id FROM tasks ORDER BY task_id DESC LIMIT 1';

                $taskId = DB::GET($sql2)[0]['task_id'];

                $sql3 = 'INSERT INTO usertasks (user_id, task_id) VALUES (:user_id, :task_id)';
                $execArray3 = [
                    ':user_id' => $task->getUserId(),
                    ':task_id' => $taskId
                ];

                DB::SET($sql3, $execArray3);
            }
        }

    }

    //------------------------------------------------------------------------------------------------------------------------
    // edit Task
    public function editTask($taskObj)
    {

    }

    public static function getUsers()
    {
        $taskControllerSQL = new TasksControllerSQL();
        return $taskControllerSQL->getAllUsers();
    }

    //------------------------------------------------------------------------------------------------------------------------
    // delete Task
    public function deleteTask($taskId)
    {
        $sql = 'DELETE FROM tasks WHERE task_id = :task_id';
        $execArray = [
            ':task_id' => $taskId
        ];

        DB::SET($sql, $execArray);

        $sql2 = 'DELETE FROM usertasks WHERE task_id = :task_id';
        $execArray2 = [
            ':task_id' => $taskId
        ];

        DB::SET($sql2, $execArray2);

        Notice::set('delete', 'Löschen hat geklappt!!!!!');
    }

    //------------------------------------------------------------------------------------------------------------------------
    // finish Task
    public function finishTask($taskId)
    {
        $sql = 'UPDATE tasks SET task_done = :done WHERE task_id = :task_id';
        $execArray = [
            ':task_id' => $taskId,
            ":done" => 1
        ];

        DB::SET($sql, $execArray);
    }
}