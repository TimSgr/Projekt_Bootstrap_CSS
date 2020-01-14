<?php
include "header.php";
?>

<?php
    include "db.php";   
    $con = create_db_connection();
    create_db_if_not_exists($con);
    create_table_if_not_exists($con);
    
    if(isset($_POST["Ansehen"])) {
        
    }

?>

<?php
include "footer.php";
?>