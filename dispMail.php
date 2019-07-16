<?php

    $myID = $_SESSION['id'];
    require('mysql_connect.php');

    $sql = "SELECT * FROM message WHERE receiverID = '$myID'";
    // echo $sql;

    // $sql = "SELECT b.*, a.username from message as b inner join usersinfo as a on (b.id = a.ids);"
    $result = mysqli_query($connect, $sql);
    // var_dump($result);
    
    $senderArray = array();
    // $count = 0;

    while($row = mysqli_fetch_assoc($result)){
        // echo $row['senderID'];
        $sendID = $row['senderID'];
        // echo "<br>";
        // $senderArray["'$row[email]'"] = 1

        $ssql = "SELECT username from userinfo where ids = '$sendID'";
        $rresult = mysqli_query($connect, $ssql);

        if($rows = mysqli_fetch_assoc($rresult)){
            // echo $rows['username'];
            $senderName = $rows['username'];
            if(array_key_exists($senderName, $senderArray)){
                // echo "Exists";
                $senderArray[$senderName] = $senderArray[$senderName]+1;
            }else{
                $senderArray[$senderName] = 1;
            }
        }
        
    }

    foreach(array_keys($senderArray) as $key){
        echo '<div class="media">
        <img src="img/ProfileImage/demo-1.jpg" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0">'.$key.' <span class="badge badge-danger">'.$senderArray[$key].'</span></h5>
        </div>
        </div>';
    }

    // var_dump($senderArray);
?>