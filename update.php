<?php
require('mysql_updateForm.php');
include('validate.php');

    $username = validate($_POST['inputUser']);
    $email = validate($_POST['inputEmail']);
    $password = validate($_POST['inputPassword']);
    $address = validate($_POST['inputAddress']);
    $contact = validate($_POST['inputContact']);
    $city = validate($_POST['inputCity']);
    $state = validate($_POST['inputState']);
    $zip = validate($_POST['inputZip']);

    

?>