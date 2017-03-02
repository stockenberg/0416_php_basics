

<table class="striped ">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>E-Mail-Adresse</th>
        <th>Role</th>
        <th>Manage</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach (\app\classes\UserController::getContent()["users"] as $row => $user) : ?>
    <tr>
        <td><?= $user["user_id"]  ?></td>
        <td><?= $user["user_username"]  ?></td>
        <td><?= $user["user_email"]  ?></td>
        <td><?= $user["user_role"]  ?></td>
        <td width="20%"><a href="?p=user-admin&action=delete&id=<?= $user["user_id"]  ?>" class="btn btn-floating red "><i class="material-icons">delete</i></a> <a href="?p=user-admin&action=edit&id=<?= $user["user_id"]  ?>#edit" class="btn-floating btn yellow"><i class="material-icons">edit</i></a>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br/><br/><br/>

<?php if(isset($_GET["action"]) && $_GET["action"] == "edit") : ?>

    <form action="?p=user-admin&action=edit&id=<?= \app\classes\UserController::getContent()["user_edit"]->getId()  ?>&save#edit" method="post" id="edit">

        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" name="update[username]" value="<?= \app\classes\UserController::getContent()["user_edit"]->getUsername() ?>" data-success="right" type="text" class="validate">
            <label for="icon_prefix">Username</label>
            <?= (\app\classes\Notice::get("username") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("username") . "</p>" : ""?>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" name="update[email]" value="<?= \app\classes\UserController::getContent()["user_edit"]->getEmail() ?>" type="text" class="validate">
            <label for="icon_prefix">E-Mail</label>
            <?= (\app\classes\Notice::get("email") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("email") . "</p>" : ""?>

        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_telephone" name="update[role]" value="<?= \app\classes\UserController::getContent()["user_edit"]->getRole() ?>" type="text" class="validate">
            <label for="icon_telephone">Role</label>
            <?= (\app\classes\Notice::get("password") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("password") . "</p>" : ""?>

        </div>
        <div class="row">
            <div class="input-field">
                <input type="submit" name="update[submit]" class="btn col offset-s5 s2" value="Save"/>
            </div>
        </div>

    </form>

<?php endif; ?>