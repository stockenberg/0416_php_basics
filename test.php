<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.02.17
 * Time: 16:26
 */

require_once "app/classes/Notice.php";

$notice = new Notice();

?>

SELECT * FROM table ORDER BY id DESC LIMIT 1
