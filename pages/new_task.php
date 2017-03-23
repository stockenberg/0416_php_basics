
<form action="?p=new_task&action=insert" method="post">

    <h4 class=""><?= (isset($_GET["action"]) && $_GET["action"] == "edit") ? "Aufgabe editieren" : "Aufgabe hinzufügen"?></h4>

    <div class="row">
        <div class="input-field col s12">
            <input id="title" type="text" name="task_title" value="<?= (is_object($app->content)) ? $app->content->getTaskTitle() : "" ?>" class="validate">
            <label class="active" for="title">Titel</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <textarea id="description" name="task_description" class="materialize-textarea"><?= (is_object($app->content)) ? $app->content->getTaskDescription() : "" ?></textarea>
            <label class="active" for="description">Beschreibung</label>
        </div>
    </div>

    <div class="input-field col s12">
        <select name="user_id">
            <option value="0" selected>unassigned</option>
            <?php
            /**
             * @var  $row
             * @var \app\classes\User $user
             */
            foreach (\app\controller\TasksController::getUsers() as $row => $user) :  ?>
                <option value="<?= $user->getId() ?>"><?= $user->getUsername() ?></option>
            <?php endforeach; ?>
        </select>
        <label>Zugewiesen zu:</label>
    </div>


    <div class="row">
        <div class="input-field col s12">
            <input type="date" id="date" name="task_deadline" value="<?= (is_object($app->content)) ? $app->content->getTaskDeadline() : "" ?>" class="datepicker">
            <label class="active" for="date" >Deadline</label>
        </div>
    </div>

    <div class="row">
        <input type="submit" name="submit" class="btn" value="speichern"/>
    </div>



</form>

