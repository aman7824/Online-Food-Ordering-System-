<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['not-logged-in'] = "please login";
        header("Location:" . SITEURL. 'admin/login.php');
    }
?>