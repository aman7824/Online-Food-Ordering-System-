<?php include("./config/constants.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <!-- logo in the tab -->
     <link rel="icon" href="../images/logo.png">
    <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- toarst  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="logo">
        <a href="<?php echo SITEURL ?>" title="Logo">
            <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: red !important;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL ?>categories.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL ?>foods.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL ?>admin/login.php">Admin</a>
            </li>
        </ul>
       
    </div>
  </div>
</nav>
    <!-- Navbar Section Starts Here -->
    <!-- Navbar Section Ends Here -->
<!-- toarst -->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!-- <script src="../../js/app.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    