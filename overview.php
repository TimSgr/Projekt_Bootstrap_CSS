<?php
include "header.php";

    include "db.php";
    $con = create_db_connection();
    create_db_if_not_exists($con);
    create_table_if_not_exists($con);
    $res = get_all($con);
    $i=0;
    while ($dsatz=mysqli_fetch_assoc($res))
    {
        $i++;
        $class = $i%2 === 0? "reversed" : "";
        $idnr = $dsatz['id'];
        if($class!="reversed")
        {
    ?>


<div class='row d-flex unternehmensform outer <?php echo $class; ?>'>
    <div class='d-flex justify-content-center align-items-center circle order-0 col-md-4'>
        <a href="singleview.php?idnr=<?php echo $idnr;?>">
            <div class="dot"> <?php echo $dsatz["short_form"]?></div>
        </a>
    </div>
    <div class="description order-1 col-8 text01 zentrieren">
        <p class='font-weight-bold'> <?php echo $dsatz["name"]?> </p>
            <?php echo $dsatz["description"] ?>
    </div>   
</div>
         
    <?php
        } else {
?>
<div class="row d-flex unternehmensform outer flex-column-reverse flex-lg-row <?php echo $class; ?>">
    <div class="d-flex justify-content-center align-items-center circle order-1 col-md-4 col-md-12 col-lg-6 col-xl-5">
        <a href="singleview.php?idnr=<?php echo $idnr;?>">
            <div class="dot"> <?php echo $dsatz["short_form"]?></div>
        </a>
    </div>        
    <div class="description order-0 col-8 col-md-12 col-lg-6 col-xl-7 text01 zentrieren">
        <p class='font-weight-bold'> <?php echo $dsatz["name"]?> </p>
            <?php echo $dsatz["description"] ?>
    </div>   
</div>

<?php
            }
    }
?>

<div class="d-flex justify-content-center">
    <a href="add.php">
        <button type="button" class="btn btn-info">Eigene Unternehmensform hinzufügen</button>
    </a>
</div>
<div class="d-flex justify-content-center space">
    <a href="manage.php">
        <button type="button" class="btn btn-info">Zur Verwaltungsansicht</button>
    </a>
</div>

<?php include "footer.php"; ?>
</body>
</html>