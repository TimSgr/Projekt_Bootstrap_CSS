<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<?php
include "header.php";
?>
<?php
include "db.php";
$con = create_db_connection();
create_db_if_not_exists($con);
create_table_if_not_exists($con);
?>
</head>
<body>
<form action="manage.php" method="post">    
<?php
if(isset($_POST['id'])) {
   $_POST["id"] = $id;
   get_single($con, $id);

   echo "<br><input name='id' value='" .$dsatz["id"].
   "'> ID <br> ";
   echo "<br><input name='name' value='" .$dsatz["name"].
   "'> Name der Rechtsform <br> ";
    echo "<br><input name='short_form' value='" .$dsatz["short_form"].
    "'> Abkürzung <br> ";
    echo "<br><input name='description' value='" .$dsatz["description"].
    "'> Beschreibung <br> ";
    echo "<br><input type='hidden' name ='oripn' value='" 
    . $_POST["id"] . "'> ";
    echo "<input type='submit' value='speichern'>";
    echo "<input type='reset'><br>";

}

else {
    $res=get_all($con);
    echo "<table border='1'>";
    while ($dsatz=mysqli_fetch_assoc($res))
    {   
        echo "<tr>";
        echo"<td><input type='radio' name='id'".
            "value='" .$dsatz["id"] . "'> &nbsp;</td>".
            "<td>". $dsatz["name"] . "&nbsp; </td> "
            ."<td>".$dsatz["short_form"] . "&nbsp; </td> "
            ."<td>".$dsatz["description"] . "&nbsp; </td> "
            ."</tr>";
    }
    echo "</table>";
    echo "<p>";
    echo "<p><input type='submit' name='submit' value='Absenden'></p>";
}
?>
</form>
<?php
include "footer.php";
?>