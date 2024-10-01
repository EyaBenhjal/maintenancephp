<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Machines</h4>
                </div>
                <div class="card-body" id="machine_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Fournisseur</th>
                                <th>Edite</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $machineList = getAll("machinee");

                            if (!empty($machineList)) {
                                foreach ($machineList as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['nom']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['nom']; ?>">
                                        </td>
                                        <td><?= $item['marque']; ?></td>

                                        <td>
                                            <a href="edit_machine.php?id=<?= $item['id']; ?>" class="btn btn-primary">Editer</a></td>
                                         <td>   <form action="code.php" method="POST">
                                                <input type="hidden" name="machine_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_machine_btn">Delete</button>
                                            </form>
                                           <!-- <button type="button" class="btn  btn-sm btn-danger delete_machine_btn" value="<?=  $item['id'];?>">Delete</button>-->

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