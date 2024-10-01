<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pieces des rechanges</h4>
                </div>
                <div class="card-body" id="pdr_id">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Model</th>
                                <th>Emplacement</th>
                                <th>Quantité_stock</th>
                                <th>Editer</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pdr = getAll("pdrrrr");

                            if (mysqli_num_rows($pdr)>0) {
                                foreach ($pdr as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['nom']; ?></td>
                                        <td><?= $item['model']; ?></td>
                                        <td><?= $item['magasin']; ?></td>
                                        <td><?= $item['quantite_stock']; ?></td>

                                        
       
                                        <td>
                                            <a href="edit_pdr.php?id=<?= $item['id']; ?>" class="btn btn-primary">Editer</a>
                                </td>        
                                             <form action="code.php" method="POST">
                                                <input type="hidden" name="pdr_id" value="<?= $item['id'];?>">
                                <td><button type="submit" class="btn btn-danger "name="delete_pdr_btn">Delete</button>
                                
                                           <!-- <button type="button" class="btn  btn-sm btn-danger delete_machine_btn" value="<?=  $item['id'];?>">Delete</button>-->

                                        </td>
                                           
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo 'No records found';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>