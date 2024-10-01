<?php
include('../functions/myfunctions.php');

if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] != 1) {
        if ($_SESSION['role_as'] == 2) {
            $_SESSION['message'] = "Welcome to the User Dashboard";
            header('Location: ../indexuser.php');
        } else {
            $_SESSION['message'] = "You are not authorized to access this page";
            header('Location: ../indexdemandeur.php');
        }
    }
} else {
    $_SESSION['message'] = "Login to continue";
    header('Location: ../login.php');
}
?>
