<?php
session_start();
include('includes\headerdem.php');
include('config/dbcon.php'); 

include('coduser.php');

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
<img src="img/cc.png" alt="image">
</div>
<form method="post" action="">
<h3>Demande d'intervention</h3>
<div class="form-group">
<input type="text" placeholder="Demandeur" class="form-control" name="demandeur" id="demandeur" required>
<div class="form-group">
    <select name="id_ma" class="form-select mb-2">
        <option selected>Open machine</option>
        <?php 
        $machines = getAll("machinee"); // Replace "machinee" with the actual table name
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
</div>
<div class="form-wrapper">
<input type="text" placeholder="Problème" class="form-control" name="probleme" id="Probleme" required>
<input type="datetime-local" placeholder="Date et Heure" class="form-control" name="deb_arret" id="deb_arret" required>
</div>
<div class="form-wrapper">
    <input type="text" placeholder="Equipement" class="form-control" name="equipement" id="equipement" required>
</div>

<div class="form-wrapper">
<input type="email" placeholder="Email" name="email" class="form-control" id="email" required>
</div>
<button type="submit" class="btn btn-primary"name="add_fichidem_btn">Envoyer</button></form>
</div>
</div>
</body>
</html>

<?php

include('includes\footer.php');
?>