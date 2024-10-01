<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <h4>Ajouter Sous_ensembles</h4>
      </div>
        <div class="card-body">

          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">

    <div class="col-md-12">
    <label for="">Sélectionnez une machine</label>
    <select name="id_ma" class="form-select mb-2">
        <?php 
        $machinee = getAll("machinee");
        if(mysqli_num_rows($machinee) > 0) {
            foreach ($machinee as $item) {
                $selected = ($item['id'] == $data['id_ma']) ? 'selected' : '';
                ?>
                <option value="<?= $item['id']; ?>" <?= $selected; ?>>
                    <?= $item['nom']; ?>
                </option>
                <?php
            }
        } else {
            echo "<option disabled>No machine available</option>";
        }
        ?>
    </select>
</div>
              <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" required name="nom" placeholder="Entrer nom" class="form-control mb-2">
              </div>

<div class="col-md-12">
<label for="">Description</label>
<textarea rows="3" name="description" placeholder="Entrer description" class="form-control"></textarea>
</div>

<div class="col-md-12">
<label for="">Upload Image</label>
  <input type="file" name="image" class="from-control">
</div>

<div class="col-md-6">
<label for="">Status</label>
  <input type="checkbox"name="status">
</div>
<div class="col-md-12">
  <button type="submit" class="btn btn-primary" name="add_se_btn">Save</button>
</div>
</div>
</div>

    </div>
  </div>
        </div>
        </div>
<?php
include("includes/footer.php");


?>