<?php
    session_start();
    // working on constants
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define("DBNAME", 'food_order');
    define('DBPASSWORD', "");
    define("SITEURL", "http://localhost/web/");


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DBPASSWORD);
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    $db_conn = mysqli_select_db($conn, DBNAME) or die(mysqli_error($conn));
?>