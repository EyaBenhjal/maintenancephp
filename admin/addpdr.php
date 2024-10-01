<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Ajouter pièce de rechange</h4>
        </div>
        <div class="card-body">

          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              
              <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" required name="nom" placeholder="Entrer nom" class="form-control mb-2">
              </div>

              <div class="col-md-6">
                <label for="fournis">Model</label>
                <input type="text" required name="model" placeholder="Entrer model" class="form-control mb-2">
                </div>

              <div class="col-md-12">
                <label for="description">Emplacement magasin</label>
                <textarea rows="3" required name="magasin" placeholder="Entrer deplacement dans magasin" class="form-control mb-2"></textarea>
              </div>
              <div class="col-md-12">
                <label for="prix">Référance</label>
                <input type="text" required name="ref" placeholder="Entrer referance" class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="qty">Quantité_stock</label>
                <input type="number" required name="quantite_stock" placeholder="Entrer quantité " class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="emplacement">Quantite securite</label>
                <input type="text" required name="st" placeholder="Entrer quantite de securite" class="form-control mb-2">
              </div>
              <div class="col-md-12">
                <label for="image">Upload Image</label>
                <input type="file" required name="image" class="form-control mb-2">
              </div>

              <div class="col-md-6">
                <label for="status">Status</label>
                <input type="checkbox"  name="status">
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="add_pdr_btn">Save</button>
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