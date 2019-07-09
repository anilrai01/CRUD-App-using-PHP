<?php
    require("mysql_updateForm.php");
    include('validate.php');

    $email = $_SESSION['email'];
    $result = mysqli_query($connect, " SELECT * FROM userinfo where email = '$email' ");
    // session_destroy();

?>

<?php $msg = "";
 while ($res = mysqli_fetch_array($result)) { ?>

    <form class="regForm" action="update.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUsername">Username</label>
                    <input type="name" class="form-control" name="inputUser" placeholder="Usernmae" value = "<?php echo $res['username']?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="inputEmail" placeholder="Email" value = "<?php echo $res['email']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Password" value = "<?php echo $res['pswrd']?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St" value = "<?php echo $res['adrs']?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Contact No.</label>
                <input type="text" class="form-control" name="inputContact" placeholder="+977 " value = "<?php echo $res['cont']?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="inputCity" value = "<?php echo $res['city']?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <!-- <select name="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select> -->
                    <input type="text" name="inputState" class="form-control" value = "<?php echo $res['stat']?>">
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="inputZip" value = "<?php echo $res['zip']?>">
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div> -->
            <button type="submit" class="btn btn-primary" name = "update">Update</button>
        </form>
<?php } 

handle_errors();

?>