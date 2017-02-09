<?php


$db = new PDO("mysql:host=localhost;dbname=library", "marten", "1234");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$SQL = "SELECT * FROM book";
$arr = array(
    ":book_id" => 2,
);



function get($SQL, $execArray) {
    global $db;
    $stmt = $db->prepare($SQL);
    $stmt->execute($execArray);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function set ($SQL, $execArray) {
    global $db;
    $stmt = $db->prepare($SQL);
    $stmt->execute($execArray);
}


$result = get($SQL, $arr);

if(isset($_GET["action"]) && $_GET["action"] == "delete"){
    $SQL = "DELETE FROM book WHERE id = :id";
    $arr = [":id" => $_GET["delete"]];
    set($SQL, $arr);
    header("LOCATION: http://localhost/php/sql.php");
    exit();
}

// TODO Formative Verlgeichen.
// TODO : Email einbauen und F1 Aufbohren lassen.
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php foreach ($result as $key => $data) :  ?>
        <p><?= $data["title"] ?><a href="?action=delete&delete=<?= $data["id"] ?>">LÖSCHEN</a></p>

    <?php endforeach; ?>
</body>
</html>
