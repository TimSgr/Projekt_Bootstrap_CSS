<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<?php
include "db.php";

if(isset($_POST['submit'])) {
    // run functions
    $con = create_db_connection();
    create_db_if_not_exists($con);
    create_table_if_not_exists($con);
    $name = $_POST["name"];
    $short_form = $_POST["short_form"];
    $description = htmlspecialchars($_POST["description"]);
    add($con, $name, $short_form, $description);
}
?>

</head>
<body>

<?php
include "header.php";
?>
<form action="add.php" method="post">
<div class="daten">
    <p> Voller Name der Rechtsform </p>
    <p>
        <input type="text" maxlength="30" placeholder="Bitte Rechtsform eingeben" id="name" name="name">
    </p>
    <p> Abkürzung (z.b. AG, GmbH, etc) </p>
    <p>
        <input type="text" maxlength="7" placeholder="Bitte Abkürzung eingeben" id="short_form" name="short_form">
    </p>
    <p> Beschreibung der Unternehmensform </p>
    <p> 
        <textarea id="description" name="description" placeholder="Bitte Beschreibung einfügen" cols="40" rows="10"></textarea>
    <p>
    <input type="submit" value="absenden" name="submit">
    <a href="manage.php">
        <button type="button" id="button01"> Hinzugefügte Rechtsformen ansehen</button>
    </a>
</div>
</form>

<?php
include "footer.php";
?> 

</body>
</html>