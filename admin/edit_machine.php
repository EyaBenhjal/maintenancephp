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
$machine=getByID("machinee",$id);
if(mysqli_num_rows($machine) >0)

{
    $data =mysqli_fetch_array($machine);
    ?>
    <div class="card">
      <div class="card-header">
      <h4>Editer Machine</h4>
      </div>
<div class="card-body">

<form action="code.php" method="POST" enctype="multipart/form-data"></cform>
<div class="row">
   <input type="hidden" name="machine_id" value="<?= $data['id']?>"> 
<div class="col-md-6">
<label for="">Nom</label>
  <input type="text" name="nom" value="<?= $data['nom']?>" placeholder="Enter name" class="form-control">
</div>


<div class="col-md-6">
    <label for="">Fournisseur</label>
    <select name="marque" class="form-select" aria-label="Default select example">
        <option value="nouvelle_option" <?= $data['marque'] === 'nouvelle_option' ? 'selected' : ''; ?>>Nouvelle Option</option>
        <option value="cvl" <?= $data['marque'] === 'cvl' ? 'selected' : ''; ?>>CVL</option>
        <option value="larysis" <?= $data['marque'] === 'larysis' ? 'selected' : ''; ?>>Larysis</option>
        <option value="ELEKTOIMPIANTI" <?= $data['marque'] === 'ELEKTOIMPIANTI' ? 'selected' : ''; ?>>ELEkTROIMPIANTI</option>
        <option value="IDROTECHNICA" <?= $data['marque'] === 'IDROTECHNICA' ? 'selected' : ''; ?>>IDROTECHNICA</option>
        <option value="STA" <?= $data['marque'] === 'STA' ? 'selected' : ''; ?>>STA</option>
    </select>
</div>
<div class="col-md-12">
<label for="">Description</label>
<textarea rows="3" name="description" placeholder="Entrer description" class="form-control" ><?= $data['description']?></textarea>
</div>

<div class="col-md-12">
<label for="">Upload Image</label>
  <input type="file" name="image" class="from-control">
  <label for="">Current Image</label>
  <input type="hidden" name="old_image"value="<?= $data['image'] ?>" >
  <img src="../uploads/<?= $data['image'] ?>" height="100px" width="100px" alt="">

</div>

<div class="col-md-12">
<label for="">Date fabrication</label>
  <input type="date"name="date_fabrication"value="<?= $data['date_fabrication']?>" placeholder="Entrer date de fabrication" class="form-control">
</div>


<div class="col-md-12">
<label for="">Matricule</label>
  <input type="text"  name="matricule"value="<?= $data['matricule']?>" placeholder="Entrer Matricule " class="form-control">
</div>
<div class="col-md-12">
    <label for="">Equipement</label>
    <select name="equipement" class="form-select" aria-label="Default select example">
        <option value="moulage" <?= $data['equipement'] === 'moulage' ? 'selected' : ''; ?>>Moulage</option>
        <option value="assemblage" <?= $data['equipement'] === 'assemblage' ? 'selected' : ''; ?>>Assemblage</option>
    </select>
</div>
<div class="col-md-6">
                <label for="status">Status</label>
                <input type="checkbox"  name="status">
              </div>
</div>
<div class="col-md-12">
  <button type="submit" class="btn btn-primary" name="update_machine_btn">Update</button>

  </div>
  </div>
    </form>
</div>
 </div>
<?php
  
} 
else{
    echo "machine infound";
}
    }
    else{
        echo "Id missing form url";
    }
    ?>
  </div>
        </div>
        </div>
<?php
include("includes/footer.php");


?>