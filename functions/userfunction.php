<?php

include('config\dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
    return  $query_run = mysqli_query($con, $query);
}


function getNomActive($table, $nom)
{
    global $con;
    $query = "SELECT * FROM $table WHERE nom= '$nom' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getseByMachine($id_ma)
{
    global $con;
    $query = "SELECT * FROM sous_ensembles WHERE id_ma='$id_ma' AND status='0'";
    return $query_run= mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status='0'";
    return $query_run=mysqli_query($con, $query);
}




?>