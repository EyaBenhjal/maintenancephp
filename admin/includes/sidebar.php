<?php
$page=  substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);



?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../admin\337312122_1976303512704012_6954637137286507735_n.jpg" class="navbar-brand-img h-100" alt="main_logo" width='40px' >
        <span class="ms-1 font-weight-bold text-white">Maintenance eya</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="index.php" ? ' active bg-gradient-primary':'';?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashbord</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="machine.php" ? 'active bg-gradient-primary':'';?>" href="machine.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Toutes les machines</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="addmachine.php" ? 'active bg-gradient-primary':'';?>" href="addmachine.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Ajouter Machine</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="sousensemble.php" ? 'active bg-gradient-primary':'';?> " href="sousensemble.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Toutes les sous_ensembles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="addsous-ensemble.php" ? 'active bg-gradient-primary':'';?> " href="addsous-ensemble.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">ajouter sous_ensembles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="pdr.php" ? 'active bg-gradient-primary':'';?> " href="pdr.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Toutes les pieces des rechanges</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="addpdr.php" ? 'active bg-gradient-primary':'';?> " href="addpdr.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Ajouter piece de rechange</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="fichinter.php" ? 'active bg-gradient-primary':'';?> "  href="fichinter.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Toutes les fiches d'interventions</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page =="addfichinter.php" ? 'active bg-gradient-primary':'';?> " href="addfichinter.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Ajouter Fiche d'intervention</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" 
        href="../logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>