<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      if(isset($_GET['id']))
      {
        $id=$_GET['id'];
        $se=getByID("sous_ensembles",$id);
        if(mysqli_num_rows($se)>0)
        {
          $data=mysqli_fetch_array($se);
      ?>

      <div class="card">
        <div class="card-header">
          <h4>Modifier Sous-ensembles</h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <label for="id_ma">Sélectionnez la machine</label>
                <select name="id_ma" class="form-select mb-2">
                  <option value="0">Machine ouverte</option>

                  <?php 
                  $machinee = getAll("machinee");
                  if(mysqli_num_rows($machinee) > 0) {
                    foreach ($machinee as $item) {
                      ?>
                      <option value="<?= $item['id']; ?>" <?= $data['id_ma'] == $item['id'] ? 'selected' : '' ?>><?= $item['nom']; ?></option>
                      <?php
                    }
                  } else {
                    echo "<option disabled>Aucune machine disponible</option>";
                  }
                  ?>

                </select>
              </div>
              <input type="hidden" name="se_id" value="<?= $data['id'];?>">
              <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" required name="nom" value="<?= $data['nom'];?>" placeholder="Entrez le nom" class="form-control mb-2">
              </div>

              <div class="col-md-12">
                <label for="description">Description</label>
                <textarea rows="3" name="description" placeholder="Entrez la description" class="form-control"><?= $data['description'];?></textarea>
              </div>

              <div class="col-md-12">
                <label class="mb-0">Télécharger l'image</label>
                <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                <input type="file" name="image" class="form-control mb-2">
                <label class="mb-0">Image actuelle</label>
                <img src="../uploads/<?= $data['image']; ?>" alt="Image actuelle" height="50px" width="50px">
              </div>

              <div class="col-md-6">
                <label for="status">Statut</label>
                <input type="checkbox" name="status" <?= $data['status'] == '1' ? 'checked' : ''; ?>>
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="update_se_btn">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php
        }
        else{
          echo "Produit introuvable pour l'ID donné";
        }
      }
      else{
        echo "ID manquant dans l'URL";
      }
      ?>
    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>