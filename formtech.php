<?php
session_start();
include('includes/headeruser.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="interv.css">
</head>
<body>


<div class="wrapper" style="background-color: #FAEBD7;">
<div class="inner">
<div class="image-holder">
<img src="img/tec.png" alt="image" >
</div>
<form action="code.php" method="POST" enctype="multipart/form-data">
<h3>Description du travail effectué </h3>
<div class="form-group">
<input type="text" placeholder="intervenant" class="form-control"name="intervenant_nom"required>
<input type="text" placeholder="cause" class="form-control"  name="cause"required> 
</div>

<div class="form-wrapper">
<label for="heure_fin">Debut diagnostique :</label>
        <input type="datetime-local" id="heure_fin" name="diag_deb" placeholder="diag_deb" class="form-control" required>
</div>
<div class="form-wrapper">
<label for="diag_fin">Fin diagnostique:</label>
        <input type="datetime-local" id="diag_fin" name="diag_fin" placeholder="diag_fin" class="form-control" required>
</div>
<div class="form-wrapper">
<label for="inter_deb">Debut intervention :</label>
        <input type="datetime-local" id="inter_deb" name="inter_deb" placeholder="inter_deb" class="form-control" required>
</div>
<div class="form-wrapper">
<label for="inter_fin">Fin intervention :</label>
        <input type="datetime-local" id="inter_fin" name="inter_fin" placeholder="inter_fin" class="form-control" required>
</div>



<div class="form-wrapper">
<label for="duree"> Piece de rechange</label>
<input type="text" name="piece_rechange" placeholder="piece_rechange" class="form-control" >
 
</div>
<div class="form-wrapper">
<label for="heure_fin">duree intervention::</label>
        <input type="datetime-local" id="heure_fin" name="diag_deb" placeholder="diag_deb" class="form-control" required>
</div>
<button><a href="formtech.php">Enregistrer</a></button>
</form>
<?php
include('includes/footer.php');
?>




<?php
session_start();
include('includes\headeruser.php');
include('config/dbcon.php');
include('coduser.php');

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

                            <form action="coduser.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="fich_id" value="<?= $data['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id_ma" > Machine Selected</label>
                                        <select name="id_ma" class="form-select mb-2" disabled>
                                            <option selected>Open machine</option>
                                            <?php
                                            $machines = getAll("machinee"); // Replace "machinee" with the actual table name
                                            if (mysqli_num_rows($machines) > 0) {
                                                foreach ($machines as $item) {
                                                    ?>
                                                    <option value="<?= $item['id']; ?>" <?= ($data['id_ma'] == $item['id']) ? 'selected' : ''; ?> >
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
                                        <input type="text" name="demandeur" value="<?= $data['demandeur'] ?>" placeholder="Entrer nom demandeur" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Debut temps arret machine</label>
                                        <input type="datetime-local" name="deb_arret" value="<?= ($data['deb_arret']) ?>" placeholder="Entrer debut d'intervention" class="form-control"readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Remede</label>
                                        <textarea rows="3" name="probleme" placeholder="Entrer le probleme" class="form-control" disabled><?= $data['probleme'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
    <label for="">Equipement</label>
    <input type="text" name="equipement" value="<?= $data['equipement'] ?>" placeholder="Entrer equipement" class="form-control">
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
                                   
                                    
<div class="col-md-12">
    <a href="lespieces.php?piece=<?=$data['piece_rechange']?>">Choisir une pièce de rechange</a>

    <label for="">Piece de rechange</label>
    <input type="text" name="piece_rechange" value="<?php echo isset($_GET['piece']) ? $_GET['nom'] : ''; ?>" placeholder="Entrer piece_rechange" class="form-control">
</div>

<br>

<div class="col-md-12">
    <label for="etat">État :</label>
    <select name="etat" id="etat" class="custom-select">
        <option value="En cours" <?php if ($data['etat'] == 'En cours') echo 'selected'; ?>>En cours</option>
        <option value="Clôturé" <?php if ($data['etat'] == 'Clôturé') echo 'selected'; ?>>Clôturé</option>
        <option value="En dépannage" <?php if ($data['etat'] == 'En dépannage') echo 'selected'; ?>>En dépannage</option>
    </select>
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





?>