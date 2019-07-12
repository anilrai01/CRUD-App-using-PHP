<?php
// session_start();
include("mysql_connect.php");

// if(isset($_GET['ps'])){
    
    $tid = $_SESSION['tid'];
    $sql = "SELECT * FROM timeline WHERE tids = $tid ";
    // echo $sql;
    $result = mysqli_query($connect, $sql);
    // }
?>
<?php 
while($res = mysqli_fetch_array($result)) { ?>
    <div class="popWrap">
    <form action="postUP.php" method="POST" enctype="multipart/form-data" class="editPost">
        <!-- <button type="button" class="btn btn-danger closeBtn" onclick = "close_();">
            <span>X</span>
        </button> -->
    
    <div class="alert alert-primary" role="alert">
      Update your content wisely !
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Your Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What did you do today ?" name="updateTitle" value = "<?php echo $res['title']?>">
        <small id="emailHelp" class="form-text text-muted">Short and Sweet Title will be better to remember !</small>
    </div>

    <div class="form-group">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Your Message Body</label>
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="8" name="updateMessage"> <?php echo $res['descTime']?> </textarea>
    </div>
    </div>

    <div class="form-group st_own">
        <!-- <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="updateFile" value = "Hello World">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div> -->
        <div class="dispImg">
            <img src="<?php echo $res['img'] ?>" alt="">
        </div>
            <div class="custom-file mt-5">
                <input type="file" class="custom-file-input" id="customFile" name="updateFile" value = "Hello World">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
       
    </div>

    <button type="submit" class="btn btn-primary" name="updateData">Update</button>
    </form>


    </div>

<?php } 

?>