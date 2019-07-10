<?php 
  $id = $_SESSION['id'];
  require("mysql_connect.php");
  $sql = "SELECT * FROM timeline WHERE ids = '$id' ";
  $result = mysqli_query($connect, $sql);
?>
<?php
while ($res = mysqli_fetch_assoc($result)) { ?>
<div class="media">

    <div class="media-img mr-5">
      <img src="<?php echo $res['img'] ?>" class="m-img" alt="...">
    </div>

    <div class="media-content">
      <div class="media-header">
      <div class="media-date"> Published On <?php echo $res['created'] ?> </div>
        <div class="media-title"><h5 class="mt-0"><?php echo $res['title'] ?></h5></div>
      </div>

        <div class="media-body">
          <div class="media-desc">
            <?php echo $res['descTime'] ?>
          </div>
        </div>
      </div>

</div>

<?php } ?>