<?php

session_start();
include('mysql_connect.php');

$id = $_SESSION['id'];

if(isset($_POST['uploadFeed'])){
    $target = './img/FeedUploads/';

    $title = $_POST['title'];
    $description = $_POST['message'];

    $file = $_FILES['file'];
    // print_r($file);

    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $validExt = array('jpg', 'jpeg', 'png', 'pdf', 'gif');

    if(in_array($fileActualExt, $validExt)){
        if($fileError === 0){
            if($fileSize < 50000000){
                $fileNewName = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'img/FeedUploads/'.$fileNewName;
                $stats = move_uploaded_file($fileTempName, $fileDestination);
                // echo $title."<br>".$description."<br>".$fileNewName;
                $query = "INSERT INTO timeline(title,descTime,img,ids)values('$title', '$description', '$fileDestination', '$id')";
                // echo "<br>".$query;
                if(mysqli_query($connect, $query)){
                    echo "Files Uploaded Successfully";
                    // header("refresh: 2; Location: home.php");
                    header("refresh: 2; url=home.php");

                }else{
                    echo "Failed to upload";
                }

                // header("Location: home.php?uploadSuccess");
            }else{
                echo "File size exceeded the maximum limit";
            }
        }else{
            echo "There was error uploading Files";
            echo $_FILES['file']['error'];
        }
    }else{
        echo "You cannot upload files of this type";
    }
}

?>