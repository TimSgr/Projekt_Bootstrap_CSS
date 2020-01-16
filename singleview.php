<?php
include "db.php";   
$con = create_db_connection();
create_db_if_not_exists($con);
create_table_if_not_exists($con);

include "header.php";

    if(isset($_GET['idnr']))
    {
        $id = $_GET['idnr'];
        echo $id;
    } 
    else 
    {
        echo "failed";
    }
    
    get_single2($con);
    $dsatz = get_single2($con);
?>
<div class="container trennung">
    <div class="row d-flex unternehmensform">
        <div class="d-flex justify-content-center align-items-center circle order-0 col-4">
            <div class="dot">
                <?php echo $dsatz['short_form'];?>
            </div>
        </div>
        <div class="description order-1 col-8">
            <p>
                <?php echo $dsatz['name'];?>
            </p>
                <?php echo $dsatz['description'];?>
        </div>   
    </div>
</div>

<?php
include "footer.php";
?>