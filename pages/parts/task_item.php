<li class="collection-header center yellow white-text darken-3"><h4>Unassigned</h4></li>

<?php
/**
 * @var \app\classes\Tasks $taskObj
 */
foreach (\app\controller\TasksController::getTaskObjectList()["unassigned"] as $row => $taskObj) :  ?>
    <li class="collection-item collection-item valign-wrapper row">
        <a href="?p=tasks&action=finish&taskId=<?= $taskObj->getTaskId() ?>">
            <i class="small material-icons left teal-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Abhaken">done</i>
        </a>
        <p class="left-align valign-wrapper left col s10" style=""><?= $taskObj->getTaskTitle() ?>
            <i class="small show yellow-text text-darken-3 material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Beschreibung lesen">info_outline</i>
        </p>
        <span class="red right label chip white-text"><?= date("d.m.Y H:i", strtotime($taskObj->getTaskDeadline())) ?></span>
        <a href="?p=new_task&action=edit&taskId=<?= $taskObj->getTaskId() ?>">
            <i class="small yellow-text text-darken-3 right material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editieren">edit</i>
        </a>
        <a href="?p=tasks&action=delete&taskId=<?= $taskObj->getTaskId() ?>">
            <i class="small delete red-text text-darken-3 right material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Löschen">delete</i>
        </a>
    </li>
    <li class="collection-item result">
        <h5>Beschreibung</h5>
        <?= $taskObj->getTaskDescription() ?>
    </li>

<?php endforeach; ?>