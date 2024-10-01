<?php
session_start();
include('includes/header.php');
?>

<?php
if(isset($_SESSION['message']))
{
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="your-styles.css"> <!-- Add your own stylesheet here -->
</head>
<body>
    <div class="background-image"></div>
    <div class="content">
        <h1>Hello</h1>
        <button class="btn btn-primary">Testing</button>
    </div>
</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .background-image {
        background-image: url('./gestion-dintervention-de-maintenance-713x300.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        width: 100vw;
        height: 100vh;
        position: fixed;
        z-index: -1; /* Put the background behind other content */
    }
    .content {
        position: relative;
        z-index: 1; /* Bring the content above the background */
        padding: 20px;
        text-align: center;
        color: white; /* Set your desired text color */
    }
</style>

<?php
include('includes/footer.php');
?>