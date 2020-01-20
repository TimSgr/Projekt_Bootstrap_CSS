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

   $dsatz=get_single($con, intval($_POST["idnr"]));
   echo "<div class='zentrieren'>";
   echo "<br><input name='id' value='" .$dsatz["id"].
   "'> <p>ID <br> ";
   echo "<br><input name='na' value='" .$dsatz["name"].
   "'> <p>Name der Rechtsform <br> ";
    echo "<br><input name='abk' value='" .$dsatz["short_form"].
    "'><p> Abkürzung <br> ";
    echo "<br><textarea name='des' id='des' cols='21' rows='5'>".$dsatz["description"].
    " </textarea> <p> Beschreibung <br> ";
    echo "<br><input type='hidden' name ='selected' value='" 
    . $_POST["idnr"] . "'> ";
    echo "<input type='submit' value='speichern' name='speichern'>";
    echo "<input type='reset'><br>";
    echo "</div>";
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

else 
{
    $res=get_all($con);
    echo "<div class='container'>";
    while ($dsatz=mysqli_fetch_assoc($res))
    {   
        echo "<div class='flex-container'>";
            echo"<div><input type='radio' name='idnr'".
                "value='" .$dsatz["id"] . "'> &nbsp;</div>".
                "<div>". $dsatz["name"] . "&nbsp; </div>".
                "<div>".$dsatz["short_form"] . "&nbsp; </div>".
                "<div>".$dsatz["description"] . "&nbsp; </div>";
        echo "</div>";
    }
    echo "</div>";
    echo "<p>";
    echo "<div class=' d-flex justify-content-center'>";
    echo "<p><input type='submit' name='submit' value='Bearbeiten'>";
    echo "<input type='submit' name='delete' value='Löschen'></p>";
    echo "<p><a href='add.php'><buttton type='button' class='button1'> &nbsp; eine Rechtsform hinzufügen &nbsp; </button></a></p>";
    echo "<p><a href='overview.php'><buttton type='button' class='button1'> &nbsp; Übersicht ansehen &nbsp; </button></a></p>";
    echo "</div>";
}
?>
<p class="abstand"></p>
</form>
<?php
include "footer.php";
?>