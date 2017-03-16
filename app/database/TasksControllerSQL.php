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
        $sql = 'SELECT * FROM usertasks ut, tasks t WHERE t.task_id <> ut.task_id AND t.task_done < 1';
        $execArray = [];

        return DB::GET($sql, $execArray);
    }

    public function getAssignedTasks() {
        $sql = 'SELECT u.*, t.*, ut.*  
                FROM usertasks AS ut, 
                tasks AS t, 
                users AS u 
                WHERE t.task_id = ut.task_id 
                AND u.user_id = ut.user_id AND t.task_done < 1';

        $execArray = [];

        return DB::GET($sql, $execArray);
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users WHERE user_role > 1";
        return DB::GETObjArr($sql, array(), "app\\classes\\User");
    }

}