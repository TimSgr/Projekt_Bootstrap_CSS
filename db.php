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
            description VARCHAR(100) NOT NULL)";
    mysqli_query($con, $sql);
}

function get_all(mysqli $con) {
    $res = mysqli_query($con,"SELECT * FROM Unternehmensform");
    $num = mysqli_num_rows($res);
    if($num > 0) echo "Folgende Datensätze wurden gefunden: <br>";
    else echo "Keine Datensätze gefunden <br>";
    return $res;
}

function get_single(mysqli $con, $id) {
    $sql = "SELECT * FROM Unternehmensform WHERE id = $id";
    var_dump($sql);
    $res = mysqli_query($con, $sql);
    $dsatz = mysqli_fetch_assoc($res);
    // $res = mysqli_query($con, $sql);
    // $dsatz = mysqli_fetch_assoc($res);
}

function delete(mysqli $con) {



}

function update(mysqli $con) {



}

function add(mysqli $con, $name, $short_form, $description) {
    $sql = "INSERT INTO Unternehmensform (name, short_form, description)"
    . " VALUES('$name', '$short_form', '$description')";
    mysqli_query($con, $sql);

    $num = mysqli_affected_rows($con);
    if ($num>0)
    {
        echo "<font color='#00aa00'>";
        echo "Ein Datensatz hinzugekommen";
        echo "</font><br>";
    }
    else 
    {
        echo "<font color='#ff0000'>";
        echo "Es ist ein Fehler augetreten, ";
        echo "Es ist kein Datensatz hinzugekommen";
        echo "</font><br>";
    }



} 
// // run functions
// create_db_connection();
// create_db_if_not_exists($con);
// create_table_if_not_exists();
?>