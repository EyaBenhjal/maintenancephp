<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $fich_id = $_GET['id'];
                $fich = getByID("fiche_intervention", $fich_id);
                if (mysqli_num_rows($fich) > 0) {
                    $data = mysqli_fetch_array($fich);
            ?>

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Fiche d'intervention</h4>
                        </div>
                        <div class="card-body">

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="fich_id" value="<?= $data['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id_ma">Select Machine</label>
                                        <select name="id_ma" class="form-select mb-2">
                                            <option selected>Open machine</option>
                                            <?php
                                            $machines = getAll("machinee"); // Replace "machinee" with the actual table name
                                            if (mysqli_num_rows($machines) > 0) {
                                                foreach ($machines as $item) {
                                                    ?>
                                                    <option value="<?= $item['id']; ?>" <?= ($data['id_ma'] == $item['id']) ? 'selected' : ''; ?>>
                                                        <?= $item['nom']; ?>
                                                    </option>
                                                <?php
                                                }
                                            } else {
                                                echo "No machine available";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nom demandeur</label>
                                        <input type="text" name="demandeur" value="<?= $data['demandeur'] ?>" placeholder="Entrer nom demandeur" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Debut temps arret machine</label>
                                        <input type="datetime-local" name="deb_arret" value="<?= ($data['deb_arret']) ?>" placeholder="Entrer debut d'intervention" class="form-control">
                                    </div>
                                    <div class="col-md-6">
    <label for="">Equipement</label>
    <input type="text" name="equipement" value="<?= ($data['equipement']) ?>" placeholder="Entrer equipement" class="form-control">
</div>


                                    <div class="col-md-6">
                                        <label for="">Debut diagnostique</label>
                                        <input type="datetime-local" name="diag_deb" value="<?= ($data['diag_deb']) ?>" placeholder="Entrer debut d'intervention" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fin diagnostique</label>
                                        <input type="datetime-local" name="diag_fin" value="<?=($data['diag_fin'])?>" placeholder="Entrer debut d'intervention" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Debut Intervention</label>
                                        <input type="datetime-local" name="inter_deb" value="<?= ($data['inter_deb']) ?>" placeholder="Entrer debut d'intervention" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fin Intervention</label>
                                        <input type="datetime-local" name="inter_fin" value="<?=$data ['inter_fin'] ?>" placeholder="Entrer debut d'intervention" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Remede</label>
                                        <textarea rows="3" name="probleme" placeholder="Entrer le probleme" class="form-control"><?= $data['probleme'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Action</label>
                                        <textarea rows="3" name="action" placeholder="Entrer l'action'" class="form-control"><?= $data['action'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nom de l'intervenant</label>
                                        <input type="text" name="intervenant_nom" value="<?= $data['intervenant_nom'] ?>" placeholder="Entrer nom intervenant" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Verification</label>
                                        <textarea rows="3" name="verification" placeholder="Entrer la verification" class="form-control"><?= $data['verification'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Piece de rechange</label>
                                        <input type="text" name="piece_rechange" value="<?= $data['piece_rechange'] ?>" placeholder="Entrer piece de rechange " class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Image</label>
                                        <div>
                                            <input type="file" name="image" class="form-control mb-2">
                                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                            <label class="mb-0">Current Image</label>
                                            <img src="../uploads/<?= $data['image']; ?>" alt="fich image" height="50px" width="50px">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="etat">État :</label>
                                        <select name="etat" id="etat" class="custom-select">
                                            <option value="En cours" <?= ($data['etat'] == 'En cours') ? 'selected' : ''; ?>>En cours</option>
                                            <option value="Clôturé" <?= ($data['etat'] == 'Clôturé') ? 'selected' : ''; ?>>Clôturé</option>
                                            <option value="En dépannage" <?= ($data['etat'] == 'En dépannage') ? 'selected' : ''; ?>>En dépannage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_fich_btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

            <?php
                } else {
                    echo "Fiche not found for the given id";
                }
            } else {
                echo "Id missing from URL";
            }
            ?>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
