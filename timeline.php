<?php 
  $id = $_SESSION['id'];
  require("mysql_connect.php");
  $sql = "SELECT * FROM timeline WHERE ids = '$id' ";
  $result = mysqli_query($connect, $sql);
?>
<?php
while ($res = mysqli_fetch_array($result)) { 
echo '<div class="media">';

echo '<div class="media-img mr-5">';
echo '<img src="'.$res['img'].'?>" class="m-img" alt="...">';
echo '</div>';

echo '<div class="media-content">';
echo '<div class="media-header">';
echo '<div class="media-date"> Published On '.$res['created'].'</div>';
echo '<div class="media-title"><h5 class="mt-0">'.$res['title'].'</h5></div>';
echo '</div>';

echo '<div class="media-body">';
echo '<div class="media-desc">';
echo $res['descTime'];
echo '</div>';
echo '<div class="formBtns">';

echo  '<a href="#" class="btn btn-success" onclick="call_();">Edit</a>';
echo  '<a href="delPost.php?nq='.$res['tids'].'" class="btn btn-danger">Delete</a>';
            
echo '</div>';
    
echo '</div>';

echo '</div>';

echo '</div>';

}

?>