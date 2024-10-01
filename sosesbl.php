<?php
session_start();
include('includes/headeruser.php');
include('functions/userfunction.php');

if(isset($_GET['machinee'])){
    $machine_nom = $_GET['machinee'];
    $machine_data = getNomActive("machinee", $machine_nom);
    $machine = mysqli_fetch_array($machine_data);

    if($machine) {
        $mid = $machine['id'];
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class='text-white' href="machiness.php">Home/</a>
            <a class='text-white' href="machiness.php">machines/</a>
            <?= $machine['nom']; ?></h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $machine['nom']; ?></h1>
                <hr>
                <div class="row">
                    <?php
                    $sous_ensembles = getseByMachine($mid);
                    if (mysqli_num_rows($sous_ensembles) > 0) {
                       foreach ($sous_ensembles as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="sosesbl_view.php?sosesbl=<?= $item['nom']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="image-container">
                                                <img src="uploads/<?= $item['image']; ?>" alt="sous_ensembles Images" class="w-100">
                                            </div>
                                            <h4 class="text-center"><?= $item['nom']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No sous-ensembles available";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
else{
    echo"Somthing went wrong";
}
}
else{
    echo"Somthing went wrong";
}


include('includes/footer.php');
?>

<style>
.image-container {
    height: 300px; /* Set the desired fixed height */
    overflow: hidden;
}

</style>