<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Ajouter Fiche d'intervention</h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
    <label for="id_ma">Select Machine</label>
    <select name="id_ma" class="form-select mb-2">
        <option selected>Open machine</option>

        <?php 
        $machines = getAll("machinee"); //  "machinee" table
        if(mysqli_num_rows($machines) > 0) {
            foreach ($machines as $item) {
                ?>
                <option value="<?= $item['id']; ?>"><?= $item['nom']; ?></option>
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
<input type="text" name="demandeur" placeholder="Entrer nom demandeur" class="form-control">
</div>
<div class="col-md-6">
<label for="">Debut temps arret machine</label>
  <input type="datetime-local"name="deb_arret"placeholder="Entrer debut d'intervention" class="form-control">
</div>
<div class="col-md-6">
                                        <label for="">Equipement</label>
                                     <input type="text" placeholder="equipement"  placeholder="Entrer equipement" class="form-control">
                                    </div>
<div class="col-md-6">
<label for="">Debut diagnostique</label>
  <input type="datetime-local"name="diag_deb"placeholder="Entrer debut d'intervention" class="form-control">

</div>
<div class="col-md-6">
<label for="">Fin diagnostique</label>
  <input type="datetime-local"name="diag_fin"placeholder="Entrer debut d'intervention" class="form-control">
</div>
<div class="col-md-6">
<label for="">Debut Intervention</label>
  <input type="datetime-local"name="inter_deb"placeholder="Entrer debut d'intervention" class="form-control">
</div>
<div class="col-md-6">
<label for="">Fin Intervention</label>
  <input type="datetime-local"name="inter_fin"placeholder="Entrer debut d'intervention" class="form-control">

</div>
<div class="col-md-6">
<label for="">Remede</label>
  <textarea rows="3"name="probleme"placeholder="Entrer le remede ou bien l'action" class="form-control"></textarea>
</div>
<div class="col-md-6">
<label for="">Action</label>
  <textarea rows="3"name="action"placeholder="Entrer l'action" class="form-control"></textarea>
</div>

<div class="col-md-6">
<label for="">Verification</label>
  <textarea rows="3"name="verification"placeholder="Entrer la verification" class="form-control"></textarea>
</div>
<div class="col-md-6">
<label for="">Nom de l'intervenant</label>
<input type="text"name="intervenant_nom"placeholder="Entrer nom intervenant" class="form-control"></textarea>
</div>
<div class="col-md-6">
<label for="">Piece de rechange</label>
  <input type="text" name="piece_rechange"placeholder="Entrer piece de rechange " class="form-control"></textarea>
</div>

<div class="col-md-12">
<label for="">Upload Image</label>
  <input type="file" name="image" class="from-control">
</div>            </div>
</div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="add_fich_btn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>
