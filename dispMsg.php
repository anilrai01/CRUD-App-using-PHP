<?php
    session_start();
    require('mysql_connect.php');

    // echo "Hi";
    $senderUser = $_GET['mId'];
    // echo $senderUser;

    $sql = "SELECT * from userinfo where username = '$senderUser' ";
    $result = mysqli_query($connect, $sql);

    while($res = mysqli_fetch_assoc($result)){
        $senderID = $res['ids'];
    }
    $myID = $_SESSION['id'];
    // echo "Your ID is ",$senderID;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/emails.css">
    <title>Emails</title>
  </head>
  <body>
    <div class="container mt-5">
        <?php 

            echo '
                <a href="home.php" class="btn btn-primary d-flex justify-content-center">Back to Home</a>
            ';

            $getMail = "SELECT * FROM message WHERE senderID = '$senderID' and receiverID = '$myID' ";
                // echo $getMail;
                $getResult = mysqli_query($connect, $getMail);
                
                while($rows = mysqli_fetch_assoc($getResult)){
                    // echo '<div class="media emails mt-3">
                    // <div class="media-body">
                    // <h5>'.$senderUser.' </h5>
                    // <img src="img/ProfileImage/demo-1.jpg" class="mr-3" alt="...">
                        
                    //         <p>
                    //             '.$rows['message'].'
                    //         </p>
                    //     </div>
                    // </div>';
                    echo '<div class="media mt-5" id="emails">
                    <img src="img/ProfileImage/demo-1.jpg" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">'.$senderUser.'</h5>
                        <p>'.$rows['message'].'</p>

                        <p>Send at '.$rows['msgDate'].'</p>
                    </div>
                    </div>';

                    $ssql = "UPDATE message SET seen = 1 where senderID = '$senderID' ";
                    if(mysqli_query($connect, $ssql)){
                        // echo "Data Read";
                    }
                }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
  </body>
</html>