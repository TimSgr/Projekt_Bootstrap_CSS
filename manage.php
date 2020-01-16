<?php
include "db.php";
$con = create_db_connection();
create_db_if_not_exists($con);
create_table_if_not_exists($con);

include "header.php";
?>

<form action="manage.php" method="post">    
<?php
if(isset($_POST["submit"])) {

   get_single1($con);
   $dsatz=get_single1($con);
   echo "<br><input name='id' value='" .$dsatz["id"].
   "'> ID <br> ";
   echo "<br><input name='na' value='" .$dsatz["name"].
   "'> Name der Rechtsform <br> ";
    echo "<br><input name='abk' value='" .$dsatz["short_form"].
    "'> Abkürzung <br> ";
    echo "<br><input name='des' value='" .$dsatz["description"].
    "'> Beschreibung <br> ";
    echo "<br><input type='hidden' name ='selected' value='" 
    . $_POST["idnr"] . "'> ";
    echo "<input type='submit' value='speichern' name='speichern'>";
    echo "<input type='reset'><br>";
}

else if(isset($_POST["speichern"]))
{
    $na = $_POST["na"];
    $abk = $_POST["abk"];
    $des = $_POST["des"];
    $id = $_POST["id"];
    $selected = $_POST["selected"];
    update($con, $na, $abk, $des,$id, $selected);
    echo "<a href='manage.php'><button type='button'> zurück zur Verwaltungsseite </button></a>";
}

else if(isset($_POST["delete"]))
{
    delete($con);
    echo "Unternehmensform erfolgreich entfernt";
    echo "<a href='manage.php'><button type='button'> zurück zur Verwaltungsseite </button></a>";
}

else {
    $res=get_all($con);
    echo "<table border='1'>";
    while ($dsatz=mysqli_fetch_assoc($res))
    {   
        echo "<tr>";
        echo"<td><input type='radio' name='idnr'".
            "value='" .$dsatz["id"] . "'> &nbsp;</td>".
            "<td>". $dsatz["name"] . "&nbsp; </td> "
            ."<td>".$dsatz["short_form"] . "&nbsp; </td> "
            ."<td>".$dsatz["description"] . "&nbsp; </td> "
            ."</tr>";
    }
    echo "</table>";
    echo "<p>";
    echo "<p><input type='submit' name='submit' value='Bearbeiten'>";
    echo "<input type='submit' name='delete' value='Löschen'></p>";
    echo "<p><a href='add.php'><buttton type='button'> eine Rechtsform hinzufügen </button></a></p>";
    echo "<p><a href='overview.php'><buttton type='button'> Übersicht ansehen </button></a></p>";
}
?>
<p class="abstand"></p>
</form>
<?php
include "footer.php";
?>