<?php

include("mysql_connect.php");

if(isset($_GET['ed'])){
    $post_id = $_GET['ed'];
    $sql = "SELECT * FROM timeline WHERE tids = '$post_id''";
    
    $result = mysqli_query($connect, $sql);

    while($res = mysqli_fetch_assoc($result)){

    }
}

?>

