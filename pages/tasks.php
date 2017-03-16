
<pre>
    <?php print_r(\app\classes\TasksController::getTaskObjectList()); ?>
</pre>
<a href="?p=new_task" class="btn"> + Neuer Task</a>
<ul class="collection with-header">
    <?php require "parts/task_item.php"?>
</ul>

<div class="row center">
    <i class="small green-text text-darken-3 center-align material-icons">games</i>
</div>

<ul class="collection with-header">
    <?php require "parts/task_item_with_name.php"?>
</ul>
