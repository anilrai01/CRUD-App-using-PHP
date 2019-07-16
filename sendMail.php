<?php
    session_start();
    require("mysql_connect.php");

    $senderMail = $_SESSION['email'];
    $receiverMail = $_POST['reMail'];
    $senderID = $_SESSION['id'];
    $message = $_POST['message'];

    echo $senderMail;
    echo "<br>";
    echo $receiverMail;
    echo "<br>";
    echo $message;

    $checkSql = "SELECT ids from userinfo WHERE email = '$receiverMail'";
    $checkResult = mysqli_query($connect, $checkSql);
    if($checkRes = mysqli_fetch_assoc($checkResult)){
        echo "Mail User found";
        $recID = $checkRes['ids'];
        // echo $recID;
        $sql =  "INSERT INTO message(senderID, receiverID, message)values('$senderID', '$recID','$message')";
        // echo $sql;

        if(mysqli_query($connect, $sql)){
            echo "Mail Send Successfully";
            header("refresh: 1; url=home.php");
        }else{
            echo "Error Sending Mail";
        }
    } else{
        echo "User not found";
        header("refresh: 1; url=home.php");
    }
    
?>