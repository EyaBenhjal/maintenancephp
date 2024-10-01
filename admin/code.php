<?php
session_start();

include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_machine_btn'])) {
   
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $description = $_POST['description'];
    $equipement = $_POST['equipement'];
    $matricule = $_POST['matricule'];
    $date_fabrication = $_POST['date_fabrication'];
    $sous_ensembles = $_POST['sous_ensembles'];
    $status = isset($_POST['status']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;
    
    $machine_query = "INSERT INTO machinee (nom, marque, description, equipement, matricule, date_fabrication, sous_ensembles, status,  image)
    VALUES ('$nom', '$marque', '$description', '$equipement', '$matricule', '$date_fabrication', '$sous_ensembles', '$status', '$filename')";
    $machine_query_run=mysqli_query($con, $machine_query);



    if ($machine_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);
        redirect("addmachine.php", "Machine Added Successfully");
    } else {
        redirect("addmachine.php", "Something Went Wrong");
    }
}

else if (isset($_POST['update_machine_btn'])){
    $machine_id=$_POST['machine_id'];
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $description = $_POST['description'];
    $equipement = $_POST['equipement'];
    $matricule = $_POST['matricule'];
    $date_fabrication = $_POST['date_fabrication'];
    $sous_ensembles = $_POST['sous_ensembles'];
    $status = isset($_POST['status']) ? '1' : '0';
   
    $new_image = $_FILES['image']['name'];
    $old_image=$_POST['old_image'];
 if (!isset($_POST['marque'])) {
        $marque = $data['marque'];
    }
    if($new_image!="")
    {
       // $update_filename=$new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;

    }
else
{
    $update_filename=$old_image;
}
$upload_path = "../uploads";

$update_query="UPDATE machinee SET nom='$nom',marque='$marque',description='$description',equipement='$equipement',matricule='$matricule',date_fabrication='$date_fabrication',sous_ensembles='$sous_ensembles',status='$status',image='$update_filename'WHERE id='$machine_id'";
$update_query_run=mysqli_query($con,$update_query);

if($update_query_run)
{
    if($_FILES['image']['name']!="")
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $update_filename);
    if(file_exists("../uploads/".$old_image))
{
    unlink("../uploads".$old_image);
}    

}
redirect("edit_machine.php?id=$machine_id","Machine Updated Successfully");
}
else
{
    redirect("edit_machine.php?id=$machine_id","Somthing went wrong");

}}
else if (isset($_POST['delete_machine_btn'])) {
    
$machine_id=mysqli_real_escape_string($con,$_POST['machine_id']);

$machine_query="SELECT * FROM machinee WHERE id='$machine_id'";
$machine_query_run=mysqli_query($con,$machine_query);
$category_data=mysqli_fetch_array($machine_query_run);
$image=$category_data['image'];

$delete_query="DELETE FROM machinee WHERE id='$machine_id'";
$delete_query_run=mysqli_query($con,$delete_query);
 if($delete_query_run)
 {
    if(file_exists("../uploads/".$image))
    {
        unlink("../uploads/".$image);
    }    
   redirect("machine.php","machine deleted Successfully");

 }
 else{
    redirect("machine.php","Something went wrong");

 }

}
        


else if (isset($_POST['add_fich_btn'])) {
    $id_ma = $_POST['id_ma'];
    $demandeur = $_POST['demandeur'];
    $deb_arret = $_POST['deb_arret'];
    $diag_deb = $_POST['diag_deb'];
    $diag_fin = $_POST['diag_fin'];
    $inter_deb = $_POST['inter_deb'];
    $inter_fin = $_POST['inter_fin'];
    $probleme = $_POST['probleme'];
    $equipement = $_POST['equipement']; 
    $cause = $_POST['cause'];
    $action = $_POST['action'];
    $verification = $_POST['verification'];
    $intervenant_nom = $_POST['intervenant_nom'];
    $piece_rechange = $_POST['piece_rechange'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($probleme != "" && $action != "" && $demandeur !== "" && $intervenant_nom != "") {

        $fich_query = "INSERT INTO fiche_intervention (id_ma, demandeur, deb_arret, diag_deb, diag_fin, inter_deb, inter_fin, probleme, equipement, cause, action, verification, intervenant_nom, piece_rechange, image)
    VALUES ('$id_ma ', '$demandeur','$deb_arret', '$diag_deb','$diag_fin', '$inter_deb', '$inter_fin','$probleme','$equipement' ,'$cause','$action', '$verification', '$intervenant_nom','$piece_rechange', '$filename')";

        $fich_query_run = mysqli_query($con, $fich_query);

        if ($fich_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);
            redirect("addfichinter.php", "Fiche intervention Added Successfully");
        } else {
            redirect("addfichinter.php", "Something went wrong");
        }
    } else {
        redirect("addfichinter.php", "All fields are mandatory");
    }
}


else if (isset($_POST['add_se_btn'])) {
    $id_ma = $_POST['id_ma'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($nom != "" && $description != "") {
        $se_query = "INSERT INTO sous_ensembles(id_ma , nom, description, status,  image) VALUES ('$id_ma ', '$nom', '$description', '$status', '$filename')";
        $se_query_run = mysqli_query($con, $se_query);

        if ($se_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);
            redirect("addsous-ensemble.php", "sous_ensembles Added Successfully");

        } else {
            redirect("addsous-ensemble.php", "Something went wrong");
        }
    } else {
        redirect("addsous-ensemble.php", "All fields are mandatory");
    }
}
if (isset($_POST['add_pdr_btn'])) {
   
    $magasin= $_POST['magasin'];
    $nom = $_POST['nom'];
    $model = $_POST['model'];
    $ref = $_POST['ref'];
    $q = $_POST['q'];
    $quantite_stock = $_POST['quantite_stock'];
    $valeur = $_POST['valeur'];
    $quantite = $_POST['quantite'];
    $st = $_POST['st'];

    $status = isset($_POST['status']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;
    
    if($nom !=""&& $quantite_stock !="")
    {
    $pdr_query = "INSERT INTO pdrrrr (magasin,nom,model , ref, q,quantite_stock,valeur,quantite,st, status, image)
    VALUES ('$magasin','$nom', '$model', '$ref', '$q','$quantite_stock','$valeur','$quantite','$st', '$status','$filename')";
    $pdr_query_run=mysqli_query($con, $pdr_query);

    if ($pdr_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);
        redirect("addpdr.php", "pdr Added Successfully");
    } 
    else {
        redirect("addpdr.php", "Something Went Wrong");
    }}

else
{
    redirect("addpdr.php", "all mindtery");

} 

}

if(isset($_POST['update_pdr_btn'])) {
    $pdr_id = $_POST['pdr_id'];
    $magasin = $_POST['magasin'];
    $nom = $_POST['nom'];
    $model = $_POST['model'];
    $ref = $_POST['ref'];
    $q = $_POST['q'];
    $quantite_stock = $_POST['quantite_stock'];
    $valeur = $_POST['valeur'];
    $quantite = $_POST['quantite'];
    $st = $_POST['st'];
    $status = isset($_POST['status']) ? '1' : '0';
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
        $upload_path = "../uploads/" . $update_filename;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            if(file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
    } else {
        $update_filename = $old_image;
    }

    $update_pdr_query = "UPDATE pdrrrr SET magasin='$magasin', nom='$nom', model='$model', ref='$ref', q='$q', quantite_stock='$quantite_stock', quantite='$quantite', st='$st', status='$status', image='$update_filename' WHERE id='$pdr_id'";
    $update_pdr_query_run = mysqli_query($con, $update_pdr_query);

    if($update_pdr_query_run) {
        redirect("edit_pdr.php?id=$pdr_id", "pdr Updated Successfully");
    } else {
        redirect("edit_pdr.php?id=$pdr_id", "Something went wrong");
    }
} 

else if (isset($_POST['update_fich_btn'])) {
    $fich_id = $_POST['fich_id'];

    $id_ma = $_POST['id_ma'];
    $demandeur = $_POST['demandeur'];
    $deb_arret = $_POST['deb_arret'];
    $diag_deb = $_POST['diag_deb'];
    $diag_fin = $_POST['diag_fin'];
    $inter_deb = $_POST['inter_deb'];
    $inter_fin = $_POST['inter_fin'];
    $probleme = $_POST['probleme'];
    $equipement = $_POST['equipement'];

    $cause = $_POST['cause'];
    $action = $_POST['action'];
    $verification = $_POST['verification'];
    $intervenant_nom = $_POST['intervenant_nom'];
    $piece_rechange = $_POST['piece_rechange'];

    $upload_path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $update_fich_query = "UPDATE fiche_intervention SET id_ma='$id_ma', demandeur='$demandeur', deb_arret='$deb_arret', diag_deb='$diag_deb', diag_fin='$diag_fin', inter_deb='$inter_deb', inter_fin='$inter_fin', probleme='$probleme',equipement='$equipement', cause='$cause', action='$action', verification='$verification', intervenant_nom='$intervenant_nom', piece_rechange='$piece_rechange', image='$update_filename' WHERE id='$fich_id'";
    $update_fich_query_run = mysqli_query($con, $update_fich_query);

if($update_fich_query_run)
{
    if($_FILES['image']['name']!="")
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $update_filename);
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }  

}
redirect("edit_fich.php?id=$fich_id","Fich Updated Successfully");
}
else
{
    redirect("edit_fich.php?id=$fich_id","Somthing went wrong");

}}
if(isset($_POST['update_se_btn'])) {
    $se_id = $_POST['se_id'];
    $id_ma = $_POST['id_ma'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
   
    $upload_path = "../uploads";
    
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $update_filename = $old_image; // Par défaut, utilisez l'ancienne image
    
    if($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
        
        // Déplacez le fichier téléchargé vers le dossier d'upload
        $target_path = $upload_path . '/' . $update_filename;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // Supprimez l'ancienne image si elle existe
            if(file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
    }
    
    // Préparez et exécutez la requête SQL
    $update_se_query = "UPDATE sous_ensembles SET nom='$nom',id_ma='$id_ma', description='$description', image='$update_filename' WHERE id='$se_id'";
    $update_query_run = mysqli_query($con, $update_se_query);

    if($update_query_run) {
        redirect("edit_se.php?id=$id_ma", "Sous-ensembles updated Successfully");
    } else {
        redirect("edit_se.php?id=$id_ma", "Something went wrong");
    }
}




else if (isset($_POST['delete_se_btn']))
{
$se_id=mysqli_real_escape_string($con,$_POST['id_ma']);

$se_query="SELECT * FROM sous_ensembles WHERE id='$se_id'";
$se_query_run=mysqli_query($con,$se_query);
$se_data=mysqli_fetch_array($se_query_run);
$image=$se_data['image'];

$delete_query="DELETE FROM sous_ensembles WHERE id='$se_id'";
$delete_query_run=mysqli_query($con,$delete_query);
 if($delete_query_run)
 {
    if(file_exists("../uploads/".$image))
    {
        unlink("../uploads/".$image);
    }    
   redirect("sousensemble.php","sous_ensembles deleted Successfully");

 }
 else{
 redirect("sousensemble.php","Something went wrong");

 }

}
else if(isset($_POST['delete_fich_btn']))
{
    
$fich_id=mysqli_real_escape_string($con,$_POST['fich_id']);

$fich_query="SELECT * FROM fiche_intervention WHERE id='$fich_id'";
$fich_query_run=mysqli_query($con,$fich_query);
$fich_data=mysqli_fetch_array($fich_query_run);
$image=$fich_data['image'];

$delete_query="DELETE FROM fiche_intervention WHERE id='$fich_id'";
$delete_query_run=mysqli_query($con,$delete_query);
 if($delete_query_run)
 {
    if(file_exists("../uploads/".$image))
    {
        unlink("../uploads/".$image);
    }    
    redirect("fichinter.php","fich deleted Successfully");

 }
 else{
    redirect("fichinter.php","Something went wrong");

 }

   
}

else 
if (isset($_POST['delete_pdr_btn'])) {
    $pdr_id = mysqli_real_escape_string($con, $_POST['pdr_id']);

    // Vérifiez si l'enregistrement existe avant de le supprimer
    $pdr_query = "SELECT * FROM pdrrrr WHERE id='$pdr_id'";
    $pdr_query_run = mysqli_query($con, $pdr_query);

    if (mysqli_num_rows($pdr_query_run) > 0) {
        $pdr_data = mysqli_fetch_array($pdr_query_run);
        $image = $pdr_data['image'];

        $delete_query = "DELETE FROM pdrrrr WHERE id='$pdr_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if ($delete_query_run) {
            // Supprimez le fichier image si elle existe
            if (file_exists("../uploads/" . $image)) {
                unlink("../uploads/" . $image);
            }

            redirect("pdr.php", "pdr deleted Successfully");
        } else {
            redirect("pdr.php", "Something went wrong");
        }
    } else {
        redirect("pdr.php", "Record not found for the given id");
    }
} 

else if (isset($_POST['add_fichidem_btn'])) {
    $id_ma = $_POST['id_ma'];

    $demandeur = $_POST['demandeur'];
    $deb_arret = $_POST['deb_arret'];
    $diag_deb = $_POST['diag_deb'];
    $diag_fin = $_POST['diag_fin'];
    $inter_deb = $_POST['inter_deb'];
    $inter_fin = $_POST['inter_fin'];
    $probleme = $_POST['probleme'];
    $cause = $_POST['cause'];
    $action = $_POST['action'];
    $verification = $_POST['verification'];
    $intervenant_nom = $_POST['intervenant_nom'];
    $piece_rechange = $_POST['piece_rechange'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($probleme!= "" && $action != "" &&   $demandeur!==""&& $intervenant_nom!="") {

    $fich_query = "INSERT INTO fiche_intervention (id_ma, demandeur, deb_arret, diag_deb, diag_fin, inter_deb,inter_fin, probleme,cause,action,verification,intervenant_nom,piece_rechange, image)
    VALUES ('$id_ma ', '$demandeur','$deb_arret', '$diag_deb','$diag_fin', '$inter_deb', '$inter_fin','$probleme', '$cause','$action', '$verification', '$intervenant_nom','$piece_rechange', '$filename')";

    $fich_query_run = mysqli_query($con, $fich_query);

    if ($fich_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);
        redirect("formdem.php", "fiche intervention Added Successfully");

    } else {
        redirect("formdem.php", "Something went wrong");
    }
}else {
    redirect("formdem.php", "All fields are mandatory");
}}


else
{
header('Location:../index.php');
}


?>