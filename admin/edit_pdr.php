<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdr = getByID("pdrrrr", $id);

    if(mysqli_num_rows($pdr) > 0) {
        $data = mysqli_fetch_array($pdr);
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit pièce de rechange</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <input type="hidden" name="pdr_id"value="<?= $data['id']?>">
              <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" required name="nom"value="<?= $data['nom']?>" placeholder="Entrer nom" class="form-control mb-2">
              </div>

              <div class="col-md-6">
                <label for="fournis">Model</label>
                <input type="text" required name="model" placeholder="Entrer model" value="<?= $data['model']?>" class="form-control mb-2">
                </div>

              <div class="col-md-12">
                <label for="description">Emplacement magasin</label>
                <textarea rows="3" required name="magasin" placeholder="Entrer deplacement dans magasin" class="form-control mb-2"><?= $data['magasin']?></textarea>
              </div>
              <div class="col-md-12">
                <label for="prix">Référance</label>
                <input type="text" required name="ref" placeholder="Entrer referance" value="<?= $data['ref']?>"class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="qty">Quantité_stock</label>
                <input type="number" required name="quantite_stock" placeholder="Entrer quantité " value="<?= $data['quantite_stock']?>"class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="emplacement">Quantite securite</label>
                <input type="text" required name="st" placeholder="Entrer quantite de securite"value="<?= $data['st']?>" class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="image">Upload Image</label>
                <input type="hidden" name="old_image"value="<?= $data['image']; ?>">
                <input type="file"  name="image" class="form-control mb-2">
                <label for="image">Current Image</label>
                <img src="../uploads/"<?= $data['image']; ?>alt="Pdr Image" height="50px" width="50px">
              </div>

              <div class="col-md-6">
                <label for="status">Status</label>
                <input type="checkbox"  name="status">
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="update_pdr_btn">Save</button>
            </div>
          </form>
        </div>
      </div>
      <?php
      }
      else
      {
        echo "Product for given id";
      }
      }
      else{
        echo "Id missing from url";
      }
      
      ?>
    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>