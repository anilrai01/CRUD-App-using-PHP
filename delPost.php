<?php

    require("mysql_connect.php");
    if(isset($_GET['nq'])){
        $post_id = $_GET['nq'];
        $sql = "DELETE FROM timeline WHERE tids= $post_id";
        
        if(mysqli_query($connect, $sql)){
            echo "File Deleted Successfully";
            header("refresh: 1; url=home.php");
        }
    }
?>