<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <h4>Ajouter Machine</h4>
      </div>
<div class="card-body">

<form action="code.php" method="POST" enctype="multipart/form-data"></cform>
<div class="row">
<div class="col-md-6">
<label for="">Nom</label>
  <input type="text" name="nom" required placeholder="Entrer nom" class="form-control">
</div>

<div class="col-md-6">
<label for="">Fournisseur</label>
  <select name="marque" required class="form-select" aria-label="Default select example">
  <option value="cvl">CVL</option>
  <option value="larysis">LARYSIS</option>
  <option value="ELEKTOIMPIANTI">ELEkTROIMPIANTI</option>
  <option value="IDROTECHNICA">IDROTECHNICA</option>
  <option value="STA">STA</option>

</select>
</div>

<div class="col-md-12">
<label for="">Description</label>
<textarea rows="3" required  name="description" placeholder="Entrer description" class="form-control"></textarea>
</div>

<div class="col-md-12">
<label for="">Upload Image</label>
  <input type="file" required name="image" class="from-control">
</div>

<div class="col-md-12">
<label for="">Date fabrication</label>
  <input type="date"required name="date_fabrication"placeholder="Entrer date de fabrication" class="form-control">
</div>
<div class="col-md-12">
<label for="">Matricule</label>
  <input type="text" required name="matricule"placeholder="Entrer Matricule " class="form-control"></textarea>
</div>
<div class="col-md-12">
    <label for="">Equipement</label>
    <select name="equipement" required class="form-select" aria-label="Default select example">
        <option value="moulage">Moulage</option>
        <option value="assemblage">Assemblage</option>
    </select>
</div>


<div class="col-md-6">
                <label for="status">Status</label>
                <input type="checkbox"  name="status">
              </div>
</div>
<div class="col-md-12">
  <button type="submit" class="btn btn-primary" name="add_machine_btn">Save</button>
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