<?php

function create_db_connection() { 
    // for mysqli_connect
    $dbhost = 'db';
    $dbuser = 'root';
    $dbpass = 'example';

    //connect to MySQL
    $con = mysqli_connect($dbhost,$dbuser,$dbpass);
    if (!$con) {
        die('Could not connect to MySQL');
    }
    return $con;
}

function create_db_if_not_exists(mysqli $con) {
    // Select the database
    $sql = "CREATE DATABASE IF NOT EXISTS Projekt_Unternehmensformen";
    $db_select = mysqli_select_db($con, 'Projekt_Unternehmensformen');
    mysqli_query($con, $sql);
}


function create_table_if_not_exists(mysqli $con) {
    $sql = "CREATE TABLE IF NOT EXISTS Unternehmensform (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            short_form VARCHAR(30) NOT NULL,
            description VARCHAR(300) NOT NULL)";
    mysqli_query($con, $sql);
}

function get_all(mysqli $con) {
    $res = mysqli_query($con,"SELECT * FROM Unternehmensform");
    $num = mysqli_num_rows($res);
    if($num > 0) {
        echo "Folgende Datensätze wurden gefunden: <br>";
    }
    else echo "Keine Datensätze gefunden <br>";
    return $res;
}

function get_single1(mysqli $con) {
    $sql = "SELECT * FROM Unternehmensform WHERE id = "
    .$_POST["idnr"];
    var_dump($sql);
    $res = mysqli_query($con, $sql);
    $dsatz = mysqli_fetch_assoc($res);
    return $dsatz;
    // $res = mysqli_query($con, $sql);
    // $dsatz = mysqli_fetch_assoc($res);
}

function get_single2(mysqli $con) {
    $sql = "SELECT * FROM Unternehmensform WHERE id = "
    .$_GET["idnr"];
    $res = mysqli_query($con, $sql);
    $dsatz = mysqli_fetch_assoc($res);
    return $dsatz;
    // $res = mysqli_query($con, $sql);
    // $dsatz = mysqli_fetch_assoc($res);
}

function delete(mysqli $con) {
    $sql = "DELETE FROM Unternehmensform WHERE id = "
    ."'".$_POST["idnr"]."'";
    var_dump($sql);
    mysqli_query($con,$sql);

}

function update(mysqli $con, $na, $abk, $des, $id, $selected) {
    $sql = "UPDATE Unternehmensform SET id = '$id', name= '$na' , ".
    "short_form= '$abk', description='$des'".
    "WHERE id = '$selected'";
    var_dump($sql);
    mysqli_query($con,$sql);
}

function add(mysqli $con, $name, $short_form, $description) {
    $sql = "INSERT INTO Unternehmensform (id, name, short_form, description)"
    . " VALUES('$name', '$short_form', '$description')";
    mysqli_query($con, $sql);
    $num = mysqli_affected_rows($con);
    if ($num>0)
    {
        echo "<div class='erfolg'>";
        echo "Ein Datensatz hinzugekommen";
        echo "</div><br>";
    }
    else 
    {
        echo "<div class='fehler'>";
        echo "Es ist ein Fehler augetreten, ";
        echo "Es ist kein Datensatz hinzugekommen";
        echo "</div><br>";
    }
} 
?>