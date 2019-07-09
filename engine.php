<?php
session_start();

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

// $errors=array();


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
    global $username, $email, $password, $address, $contact, $city, $state, $zip, $db, $msg;
    $username = validate($_POST['inputUser']);
    $email = validate($_POST['inputEmail']);
    $password = validate($_POST['inputPassword']);
    $address = validate($_POST['inputAddress']);
    $contact = validate($_POST['inputContact']);
    $city = validate($_POST['inputCity']);
    $state = validate($_POST['inputState']);
    $zip = validate($_POST['inputZip']);

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

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
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