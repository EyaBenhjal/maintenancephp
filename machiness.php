<?php
session_start();
include('includes/headeruser.php');
include('functions/userfunction.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6>Home/machines</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> Machines</h1>
                <hr>
                <div class="row">
                    <?php 
                    $machine = getAllActive("machinee");
                    if(mysqli_num_rows($machine) > 0) {
                        foreach($machine as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="sosesbl.php?machinee=<?= $item['nom']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="image-container">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Machine Image" class="w-100 img-fluid">
                                            </div>
                                            <h4 class="text-center"><?= $item['nom']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php 
                        }
                    } else {
                        echo "No machine available";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>
<style>
.image-container {
    height: 300px; /* Set the desired fixed height */
    overflow: hidden;
}

</style>