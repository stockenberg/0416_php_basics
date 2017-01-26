<?php
// Beispiel $_POST

echo '<pre>';
print_r($_POST);
echo '</pre>';

$contact = (isset($_POST["contact"])) ? $_POST["contact"] : "";
$errors = [];
$final = [];

if (isset($contact["submit"])) {
    if (empty($contact["firstname"])) {
        $errors["firstname"] = "Bitte vorname ausfüllen.";
    }else{
        $final["firstname"] = htmlspecialchars(strip_tags($contact["firstname"]));
    }
    if(empty($errors)){
        echo "Mail gesendet!";
    }
}

echo '<pre>';
print_r($final);
echo '</pre>';

?>
<h2>Hallo</h2>

<form action="<?= _BASE_ ?>" method="post">
    <div>
        <select name="contact[title]" id="">
            <option selected disabled>Bitte wählen</option>
            <option value="male">Herr</option>
            <option value="female">Frau</option>
        </select>
    </div>

    <div>
        <input type="text" name="contact[firstname]"/>
        <?= ( isset($errors["firstname"]) ) ? "<p class=\"error\">" . $errors["firstname"] . "</p>" : "" ?>
    </div>

    <div>
        <p>Raucher ? </p>
        Ja <input type="radio" name="contact[smoker]" value="1"/>
        Nein <input type="radio" name="contact[smoker]" value="0"/>
    </div>


    
    <div>
        <textarea name="contact[message]" id="" cols="30" rows="10"></textarea>
    </div>

    <input type="submit" name="contact[submit]" value="Absenden">
</form>