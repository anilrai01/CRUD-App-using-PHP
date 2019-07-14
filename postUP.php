<?php 
    session_start();
    require("mysql_connect.php");
    $tid = $_SESSION['tid'];
    $id = $_SESSION['id'];

        $target = './img/FeedUploads/';
    
        $title = $_POST['updateTitle'];
        
        $description = $_POST['updateMessage'];
        
        $file = $_FILES['updateFile'];

        // echo $_FILES['updateFile']['name'];
        // echo "<br>";
        // echo $_FILES['updateFile']['tmp_name'];


    if(empty($_FILES['updateFile']['name'])){
        echo "New file not selected Default Data will be updated</br>";
        $sql = "UPDATE timeline SET title = '$title', descTime = '$description' WHERE tids = '$tid' && ids = '$id'";
        
        if(mysqli_query($connect, $sql)){
            echo "Files Updated Successfully";
            
            header("refresh: 1; url=home.php");
        } 
    }else{
        echo "Files Selected </br>";
    
        $fileName = $_FILES['updateFile']['name'];
        $fileTempName = $_FILES['updateFile']['tmp_name'];
        $fileSize = $_FILES['updateFile']['size'];
        $fileError = $_FILES['updateFile']['error'];
        $fileType = $_FILES['updateFile']['type'];
    
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
                    $sql = "UPDATE timeline SET title = '$title', descTime = '$description', img = '$fileDestination' WHERE tids = '$tid' && ids = '$id'";
                    // echo "<br>".$sql;
                    if(mysqli_query($connect, $sql)){
                        echo "Files Updated Successfully";
                        
                        header("refresh: 1; url=home.php");
                    }

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