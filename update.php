<?php
session_start();
require('mysql_updateForm.php');
include('validate.php');

    $emmail = $_SESSION['email'];
    
    $username = validate($_POST['inputUser']);
    
    $email = validate($_POST['inputEmail']);
    $password = validate($_POST['inputPassword']);
    

    $address = validate($_POST['inputAddress']);
    $contact = validate($_POST['inputContact']);
    $city = validate($_POST['inputCity']);
    $state = validate($_POST['inputState']);
    $zip = validate($_POST['inputZip']);

    //Checking if empty
    if(empty($username))
	{
		array_push($errors,"Username cannot be empty");
	}
	if(empty($email))
	{
		array_push($errors,"Email cannot be empty");
	}
	if(empty($password))
	{
		array_push($errors,"Password cannot be empty");
	}
	if(empty($address))
	{
		array_push($errors,"Address cannot be empty");
    }
    if(empty($contact))
	{
		array_push($errors,"Contact cannot be empty");
    }
    if(empty($city))
	{
		array_push($errors,"City cannot be empty");
    }
    if(empty($state))
	{
		array_push($errors,"State cannot be empty");
    }
    if(empty($zip))
	{
		array_push($errors,"Zip cannot be empty");
	}
  
    if(count($errors)==0){
        $hashPwd = md5($password); // md5 encryption password
        $sql = "UPDATE userinfo SET username = '$username',
        email = '$email',
        pswrd = '$hashPwd',
        adrs = '$address',
        cont = '$contact',
        city = '$city',
        stat = '$state',
        zip = '$zip' where email = '$emmail' ";
        
        //New session Email
        $_SESSION['email'] = $email;

        if(mysqli_query($connect, $sql)){
            echo "<h2 
            style = '
                font-family: Arial;
                display: inline-block;
                text-align: center;
                align-items: center;
                justify-content: center;
                color: green;
                padding: 20px 40px; 
                background: #ccc;
                border-radius: 40px;
            '> Database Updated Successfully </h2>";

            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation Data Updated Successfully !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    
        // header("Location:home.php");
        header("refresh: 2; url=home.php");

        }
    }

?>