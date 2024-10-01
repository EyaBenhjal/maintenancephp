<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Toutes Les Fiches d'intervention</h4>
                </div>
                <div class="card-body" id="fich_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id_machine</th>
                                <th>Demandeur</th>

                                <th>Remede</th>
                                
                                <th>nom_intervenant</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fich= getAll("fiche_intervention");

                            if (mysqli_num_rows($fich)) {
                                foreach ($fich as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['id_ma']; ?></td>
                                        <td><?= $item['demandeur']; ?></td>
                                        <td>
                                        <?= $item['probleme']; ?> 
                                                                           </td>
                                        <td><?= $item['intervenant_nom'] ; ?></td>

                                        <td>
                                            <a href="edit_fich.php?id=<?= $item['id']; ?>" class="btn btn-primary">Editer</a>
                                </td> 
                                <td>
                                            
                                <form action="code.php" method="POST">
                                                <input type="hidden" name="fich_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_fich_btn">Delete</button>
                                            </form>
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