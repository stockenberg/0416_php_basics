<form action="" method="post">
    <div class="input-field col s12">
        <input name="contact[firstname]" data-success="right" value="<?= @$_POST["contact"]["firstname"] ?>" type="text" class="validate">
        <label>Firstname</label>
        <?= (\app\classes\Notice::get("firstname") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("firstname") . "</p>" : ""?>
    </div>
    <div class="input-field col s12">
        <input name="contact[lastname]" data-success="right" value="<?= @$_POST["contact"]["lastname"] ?>" type="text" class="validate">
        <label>Lastname</label>
        <?= (\app\classes\Notice::get("lastname") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("lastname") . "</p>" : ""?>
    </div>
    <div class="input-field col s12">
        <input name="contact[email]" data-success="right" value="<?= @$_POST["contact"]["email"] ?>" type="text" class="validate">
        <label>Email</label>
        <?= (\app\classes\Notice::get("email") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("email") . "</p>" : ""?>
    </div>
    <div class="input-field col s12">
        <textarea name="contact[message]" data-success="right" type="text" class="materialize-textarea validate"><?= @$_POST["contact"]["message"] ?></textarea>
        <label>Message</label>
        <?= (\app\classes\Notice::get("message") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("message") . "</p>" : ""?>
    </div>
    <input type="submit" value="Senden" name="contact[submit]" class="btn">
</form>

<br/><br/><br/>