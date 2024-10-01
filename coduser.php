<?php
include('config/dbcon.php');
include('fpdf/fpdf.php');
include('functions\userfunction.php');

?>

<?php

if (isset($_POST['updat_fich_btn'])) {
   
    $fich_id = $_POST['fich_id'];


    $diag_deb = $_POST['diag_deb'];
    $diag_fin = $_POST['diag_fin'];
    $inter_deb = $_POST['inter_deb'];
    $inter_fin = $_POST['inter_fin'];

    $cause = $_POST['cause'];
    $action = $_POST['action'];
    $verification = $_POST['verification'];
    $intervenant_nom = $_POST['intervenant_nom'];
    $piece_rechange = $_POST['piece_rechange'];
    $etat= $_POST['etat'];

    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;


    $update_fich_query = "UPDATE fiche_intervention SET   diag_deb='$diag_deb', diag_fin='$diag_fin', inter_deb='$inter_deb', inter_fin='$inter_fin', cause='$cause', action='$action', verification='$verification', intervenant_nom='$intervenant_nom', piece_rechange='$piece_rechange', etat='$etat', image='$filename' WHERE id='$fich_id'";
    $update_fich_query_run = mysqli_query($con, $update_fich_query);


    
    if ($fich_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . '/' . $filename);    redirect("formchh.php?id=$fich_id","Fich Updated Successfully");
            }
            else
            {
                redirect("lesdemand.php?id=$fich_id"," fiche d'ntervention modifiée avec succées");
            
            }}


   

else if (isset($_POST['add_fichidem_btn'])) {
    $id_ma = $_POST['id_ma'];

    $demandeur = $_POST['demandeur'];
    $deb_arret = $_POST['deb_arret'];
    $probleme = $_POST['probleme'];
    $equipement =$_POST['equipement'] ;
    $email = $_POST['email'];

    if ($probleme != "" && $demandeur != "" && $equipement != "") {
        $fich_query = "INSERT INTO fiche_intervention ( id_ma,demandeur, deb_arret, probleme, equipement, email)
        VALUES ( '$id_ma','$demandeur', '$deb_arret', '$probleme', '$equipement', '$email')";
    
    
        $fich_query_run = mysqli_query($con, $fich_query);

        if ($fich_query_run) {
            redirect("formdem.php?id=$fich_id","demande envoyée avec succées");
        }
        else
        {
            redirect("formdem.php?id=$fich_id","Somthing went wrong");
        
        }}
}

function getAll($table)
{
    global $con;
    $query="SELECT * FROM $table";
    return $query_run=mysqli_query($con,$query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id'";
   return $query_run=mysqli_query($con,$query);
}

function redirect($url,$message)
{
    $_SESSION['message']=$message;
    header('Location:'.$url);
    exit(0);
}



?>