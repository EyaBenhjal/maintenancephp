<?php
session_start();
include('includes/headeruser.php');
include('config/dbcon.php'); // inclure fichier de configuration de la base de données.

// Récupérer toutes les fiches d'intervention
$fiches = getAll("fiche_intervention");
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
                                <th>ID</th>
                                <th>Id_machine</th>
                                <th>Demandeur</th>

                                <th>Remede</th>

                                <th>Action</th>
                                <th>nom_intervenant</th>
                                <th>Action</th>
                                
                                <th>État</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($fiches) > 0) {
                                foreach ($fiches as $item) {
                                    // Récupérer l'état de cette fiche
                                    $query = "SELECT etat FROM fiche_intervention WHERE id = {$item['id']}";
                                    $result = $con->query($query);
                                    $row = $result->fetch_assoc();
                            ?>
                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['id_ma']; ?></td>
                                <td><?= $item['demandeur']; ?></td>

                                <td><?= $item['probleme']; ?></td>
                                <td><?= $item['action']; ?></td>
                                <td><?= $item['intervenant_nom']; ?></td>
                                <td>
                                    <a href="formchh.php?id=<?= $item['id']; ?>" class="btn btn-primary">Completer</a>
                                </td>
                                <td>
                                    <?php echo $row['etat']; ?>
                                    <?php if ($row['etat'] === 'En dépannage'): ?>
                                        <img src="lampe.jpg" height="40px" width="40px"alt="Lampe d'attention">
                                    <?php endif; ?>
                                    <?php if ($row['etat'] === 'Clôturé'): ?>
                                        <img src="lampev.png" height="30px" width="30px"alt="Lampe d'attention">
                                    <?php endif; ?>
                                    
                                    <?php if ($row['etat'] === 'En cours'): ?>
                                        <img src="cours.png" height="30px" width="30px"alt="Lampe d'attention">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="coduser.php" method="POST">
                                        <input type="hidden" name="fich_id" value="<?= $item['id']; ?>">
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
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
?>
<?php
include("includes/footer.php");
?>
