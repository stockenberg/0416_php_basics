<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 09.02.17
 * Time: 16:16
 */

namespace app\classes;

class EmployeeManger
{

    function save(Employee $param){
        $SQL = "statement";
        $arr = array(
            ":firstname" => $param->getName(),
            ":desription" => $param->getDescription()
        );
    }

}

$employee = new Employee();
$employee->setName("Hans");

$em = new EmployeeManger();
$em->save($employee);