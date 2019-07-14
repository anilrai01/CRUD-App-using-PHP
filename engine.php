<?php
session_start();
include('validate.php');

// Initializing Variables for registeration

$username = '';
$email = '';
$password = '';
$address = '';
$contact = '';
$city = '';
$state = '';
$zip = '';

$msg = '';

$logEmail = '';
$logPassword = '';

$db = new mysqli('localhost','root','','crud');
$connect = mysqli_connect('localhost', 'root', '', 'crud');

if($db->connect_error){
    $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Database Connection Error!</strong> You should check if your database is actually 
    created or not.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_POST['signUp'])){
    user_registeration();
}

if(isset($_POST['signIn'])){
    user_login();
}


function user_registeration(){
    global $username, $email, $password, $address, $contact, $city, $state, $zip, $db, $msg, $errors;
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
	// if($password1!=$password2)
	// {
	// 	array_push($errors,"password didnot match");
    // }
    
    if(count($errors)==0){
        $hashPwd = md5($password); // md5 encryption password
        $sql = "INSERT INTO userinfo(username, email, pswrd, adrs, cont, city, stat, zip) values ('$username', '$email', '$hashPwd', '$address', '$contact', '$city', '$state', '$zip') ";
    
        if($db->query($sql)===TRUE){
            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation !</strong> You are now officially a member of Words from Heart ! Now Log in by entering email and password in above field !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    
          header("refresh: 5; url=index.php");
        }
    }
}



function user_login(){
    global $logEmail, $logPassword, $db, $msg;
    $logEmail = $_POST['email'];
    $logPassword = $_POST['password'];
    $checkPswrd = md5($logPassword);

    $sql = "SELECT * FROM userinfo WHERE email = '$logEmail' AND pswrd = '$checkPswrd'";
    $result = $db->query($sql);

    
    if($result->num_rows == 1){
        $data = $result->fetch_assoc();
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['ids'];

        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

        header("refresh: 1; url=home.php");

    }else{
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Incorrect Username or Password! </strong> Please insert valid username or password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

    }
}



?>