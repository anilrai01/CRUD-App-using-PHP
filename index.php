<?php include('engine.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hidden World</title>
  </head>
  <body>
    
    <section name="logReg">
        <div class="container">
        
            <div class="row">
                <div class="col-md-12 text-center p-2 bg-primary text-white"><h2>Words from the Heart</h2></div>
            </div>

            <div class="row">
                
                    <div class="col-md-12">
                        <!-- Log in form -->
                        <form class="loginForm" method="POST">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Email address</label> -->
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small name="emailHelp" class="form-text text-muted">Never share your email or password with anyone</small>
                            </div>
                            <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Password</label> -->
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <!-- <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                            <button type="submit" class="btn btn-primary mr-2" name="signIn">Sign In</button>
                        </form>
                        
                    </div>
                
            </div>

    
            <h5 class="text-center mt-3 msg">Start Capturing and Reframing your day to day life now !</h5>

            <div class="row mt-4">
                <div class="col-md-6 banner">
                    <!-- <div class="banner-svg"></div> -->

                    <?php echo $msg ?>

                </div>

                


                <div class="col-md-5 offset-1">
                <!-- Registeration Side -->

                    <form class="regForm" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputUsername">Username</label>
                                <input type="name" class="form-control" name="inputUser" placeholder="Usernmae">
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
                    </form>

                </div> 
                <!-- End of Registeration Side -->

                <div class="col-md-2">
                    <!-- <h2>Already Have an Accout ?</h2>
                    <h3>Log In here -></h3> -->
                </div>

                
            </div>
        
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>