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
    <?php foreach ($app->content["users"] as $row => $user) : ?>
    <tr>
        <td><?= $user["user_id"]  ?></td>
        <td><?= $user["user_username"]  ?></td>
        <td><?= $user["user_email"]  ?></td>
        <td><?= $user["user_role"]  ?></td>
        <td width="20%"><a href="?p=user-admin&action=delete&delete=<?= $user["user_id"]  ?>" class="btn red "><i class="material-icons">delete</i></a> - <a href="?p=user-admin&action=edit&edit=<?= $user["user_id"]  ?>" class="btn yellow"><i class="material-icons">edit</i></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br/><br/><br/>