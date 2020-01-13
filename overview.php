<?php
include "header.php";
?>

<?php 
    include "db.php";
    $con = create_db_connection();
    create_db_if_not_exists($con);
    create_table_if_not_exists($con);
    $res = get_all($con);
    while ($dsatz=mysqli_fetch_assoc($res))
    {

?>

         <div class='row d-flex unternehmensform'>
             <div class='d-flex justify-content-center align-items-center circle order-0 col-md-4'>
                <div class="dot" onclick="javascript:location.href='<?php echo $dsatz["short_form"]?>.php'"><?php echo $dsatz["short_form"]?></div>
             </div>
             <div class="description order-1 col-8 text01">
                 <p class='font-weight-bold'> <?php echo $dsatz["name"]?> </p>
                 <?php echo $dsatz["description"] ?>
             </div>   
         </div>
         
        <div class="row d-flex unternehmensform flex-column-reverse flex-lg-row">
            <div class="d-flex justify-content-center align-items-center circle order-1 col-md-4 col-md-12 col-lg-6 col-xl-5">
                <div class="dot" onclick="javascript:location.href='ag.html'"><?php echo $dsatz["short_form"]?></div>
            </div>        
            <div class="description order-0 col-8 col-md-12 col-lg-6 col-xl-7">
                <p class='font-weight-bold'> <?php echo $dsatz["name"]?> </p>
                <?php echo $dsatz["description"] ?>
            </div>   
        </div>



<?php
}
?>
<p> 
    <center>
        <button type="button" class="btn btn-info" onclick="javascript:location.href='neu1.php'"> Eigene Unternehmensform hinzufügen </button>
    </center>
</p>
    

<?php
include "footer.php";
?>
</body>
</html>