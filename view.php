<?php

require 'engine.php';

$username = '';
$email = '';
$password = '';
$address = '';
$contact = '';
$city = '';
$state = '';
$zip = '';

// Exported Variables
$user = $_SESSION['username'];

//Show name
$show = $user;

    $content = '';

    if(isset($_POST['postFeed'])){
        showForm();
    }

    if(isset($_POST['profile'])){
        updateProfile();
    }

    function showForm(){
        global $content;
        $content = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    function updateProfile(){
        // global $db, $user;
        // $content = $user
        $sql = "SELECT * FROM userinfo WHERE username = '$user' LIMIT 1";

        $result = $db->query($sql);

        if($result->num_rows == 1){
        // global $username, $email, $password, $address, $contact, $city, $state, $zip, $content;

            $data = $result->fetch_assoc();

            // $username = $data['username'];
            // $email = $data['email'];
            // $password = $data['pswrd'];
            // $address = $data['adrs'];
            // $contact = $data['cont'];
            // $city = $data['city'];
            // $state = $data['stat'];
            // $zip = $data['zip'];


            $content = ' <form class="regForm" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUsername">Username</label>
                    <input type="name" class="form-control" name="inputUser" placeholder="Usernmae" value = '$data["username"]'>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Contact No.</label>
                <input type="text" class="form-control" name="inputContact" placeholder="+977 ">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="inputCity">
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <!-- <select name="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select> -->
                    <input type="text" name="inputState" class="form-control">
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="inputZip">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name = "signUp">Sign Up</button>
        </form>';

        }

    }


?>