<?php
    session_start();
    if(!$_SESSION["email"]){
        header("LOCATION: home.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/loggedStyle.css">
    <title>Welcome</title>
  </head>
  <body>
      
    <div class="container-fluid">
        
            <!-- DashBoard -->
            <div class="col-md-3 dash">

                <div class="profImage">
                    <div class="profImageCover">
                        <img src="img/demo-1.jpg" alt="">
                    </div>
                    <div class="bio">
                        <br>
                        <h6 class="text-white"> User: <?php echo $_SESSION['email'] ?> </h6>
                    </div>
                </div>

                <div class="togglers">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button class = "ownBtn" name = "memories"> Timeline </button>
                        <button class = "ownBtn" name = "emails"> Email </button>
                        <button class = "ownBtn" name = "postFeed"> Share Feeds </button>
                        <button class = "ownBtn" name = "profile"> Update Profile </button>
                        <button class = "ownBtn" name = "sendMail"> Send Email </button>
                        <button class = "ownBtn" name = "logout"> Log Out </button>
                    </form>
                </div>

            </div>

            <!-- Content -->
           

                <div class="container p-5 dashField rightPlank">

                    <?php include('timeline.php');  ?>

                    <?php 
                        if(isset($_POST['memories'])){
                            include('clearView.php');
                            include('timeline.php');
                        }
                    ?>

                    <?php 
                        if(isset($_POST['emails'])){
                            include('clearView.php');
                            include('dispMail.php');
                        }
                    ?>
                    
                    <?php 
                        if(isset($_POST['postFeed'])){
                            include('clearView.php');
                            include('shareFeed.php');
                        } 
                    ?>

                    <?php 
                        if(isset($_POST['profile'])){
                        include('clearView.php');
                        // echo "Pressed";
                        include('dispForm.php');
                        }
                    ?>

                    <?php 
                        if(isset($_POST['sendMail'])){
                        include('clearView.php');
                        // echo "Pressed";
                        include('dispMailForm.php');
                        }
                    ?>

                    <?php
                        if(isset($_POST['logout'])){
                            session_start();
                            session_unset();
                            session_destroy();
                            header('Location:index.php');
                        }
                    ?>

                </div>

            </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
  </body>
</html>