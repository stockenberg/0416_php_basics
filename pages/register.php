
<div class="row">
    <form class="col s12" style="margin: auto;" action="" method="post">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" name="register[username]" data-success="right" type="text" class="validate">
            <label for="icon_prefix">Username</label>
            <?= (\app\classes\Notice::get("username") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("username") . "</p>" : ""?>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_telephone" name="register[password]" type="password" class="validate">
            <label for="icon_telephone">Password</label>
            <?= (\app\classes\Notice::get("password") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("password") . "</p>" : ""?>

        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" name="register[email]" type="text" class="validate">
            <label for="icon_prefix">E-Mail</label>
            <?= (\app\classes\Notice::get("email") > '') ?  "<p class='red-text'>" . \app\classes\Notice::get("email") . "</p>" : ""?>

        </div>
        <div class="row">
            <div class="input-field">
                <input type="submit" name="register[submit]" class="btn col offset-s5 s2" value="Absenden"/>
            </div>
        </div>
    </form>
</div>