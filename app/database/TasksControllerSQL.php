<?php
/**
 * Created by PhpStorm.
 * User: TobiasSchramek
 * Date: 15.03.17
 * Time: 17:30
 */


namespace app\database;

use app\traits\DB;

class TasksControllerSQL
{

    public function getUnassignedTasks() {
        // TODO : Problem: Es werden alle Aufgaben x4 ausgelesen => dieses statement überarbeiten, sodass am ende nur soviele aufgaben rauskommen wie auch in der Datenbank stehen OHNE Duplikate
        $sql = 'SELECT t.* FROM tasks as t LEFT JOIN usertasks AS ut ON t.task_id = ut.task_id WHERE ut.usertasks_id IS NULL AND t.task_done < 1';
        $execArray = [];

        return DB::GET($sql, $execArray);
    }

    public function getAssignedTasks() {
        $sql = 'SELECT u.*, t.*, ut.*  
                FROM usertasks AS ut, 
                tasks AS t, 
                users AS u 
                WHERE t.task_id = ut.task_id 
                AND u.user_id = ut.user_id AND t.task_done < 1 ORDER BY u.user_username ASC';

        $execArray = [];

        return DB::GET($sql, $execArray);
    }

    public function getTaskByID(int $id){

        $SQL = "SELECT * FROM tasks WHERE task_id = :id";
        $execArr = [":id" => $id];

        return DB::GETObj($SQL, $execArr, "app\\objects\\Tasks");
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users WHERE user_role > 1";
        return DB::GETObjArr($sql, array(), "app\\objects\\User");
    }

}
