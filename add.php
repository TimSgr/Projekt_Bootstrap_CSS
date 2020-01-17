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

include "header.php";
?>
<form action="add.php" method="post">
    <div class='container  space'>
        <div class="row d-flex">
            <div class="d-flex justify-content-center align-items-center circle order-0 col-md-4 ausrichtung">
                <p> Voller Name der Rechtsform &nbsp; </p>
            </div>
            <div class=" order-1 col-md-8 ausrichtung ordnung">
                <p>    
                    <input type="text" maxlength="30" placeholder="Bitte Rechtsform eingeben" id="name" name="name">
                </p>
            </div>
        </div>
    </div>
    <div class='container '>
        <div class='row d-flex'>
            <div class="d-flex justify-content-center align-items-center circle order-0 col-md-4 ausrichtung">
                <p> Abkürzung (z.b. AG, GmbH, etc) &nbsp;</p>
            </div>
            <div class=" order-1 col-md-8 ausrichtung ordnung">
                <p>
                    <input type="text" maxlength="7" placeholder="Bitte Abkürzung eingeben" id="short_form" name="short_form">
                </p>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class='row d-flex'>
            <div class="d-flex justify-content-center align-items-center circle order-0 col-md-4 ausrichtung">   
                <p> Beschreibung der Unternehmensform &nbsp; </p>
            </div>
            <div class=" order-1 col-md-8 ausrichtung ordnung">   
                <textarea id="description" name="description" placeholder="Bitte Beschreibung einfügen" cols="21" rows="5"></textarea>
            </div>
        </div>
    <p>
        <div class="d-flex justify-content-center">
            <p>
                <input type="submit" value="absenden" name="submit">
            </p>
        </div>
        <div class="d-flex justify-content-center">
            <p>
                <a href="manage.php">
                    <button type="button" id="button01"> Hinzugefügte Rechtsformen ansehen</button>
                </a>
            </p>
        </div>
    </div>
</form>

<?php
include "footer.php";
?> 

</body>
</html>