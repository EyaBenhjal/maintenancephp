<?php
session_start();
include('includes/headeruser.php');
include('functions/userfunction.php');

if(isset($_GET['sous_ensembles'])){

    $se_nom=$_GET['sous_ensembles'];
    $se_data = getNomActive("sous_ensembles", $se_nom);
    $se = mysqli_fetch_array($se_data);
    if ($se)
    {
        ?>
<div class="container">
<div class="row">
    <div class="col-md-4">
        <img src="uploads/<?= $se['image'];?>" alt ="sous_ensembles image" class="w-100">
    </div>
    <div class="col-md-8">
        <h4><?=  $se['nom'];?></h4>
        <hr>
        <h4><?=  $se['description'];?></h4>

    </div>
</div>
</div>
<?php    
}
    else
    {
        echo "no sous_ensemble";
    }
}

else 
{
    echo "Something went wrong";
}

include('includes/footer.php');
?>
