<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="indexus.php">MISTA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="formtech.php">Espace Technicien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lesdemand.php">Les demandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="lespieces.php"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="machiness.php">Les machines</a>
        </li>
        
        <?php
        if(isset($_SESSION['auth']))
        {
          ?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?= 
           $_SESSION['auth_user']['name'];?>
           
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
          <?php

        }
        else 
        {
          ?>

       
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>