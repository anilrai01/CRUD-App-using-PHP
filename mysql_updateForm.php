<?php
   
    // require 'view.php';
    // global $email;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>