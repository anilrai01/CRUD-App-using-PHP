<form action="updateShareFeed.php" method="POST" enctype="multipart/form-data">
    <!-- <h3>Start sharing your feelings !</h3> -->
    <div class="alert alert-primary" role="alert">
      Start posting and recording your stories.
    </div>
    <br>

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What did you do today ?" name="title">
    <small id="emailHelp" class="form-text text-muted">Short and Sweet Title will be better to remember !</small>
  </div>

  <div class="form-group">
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Wanna write something more about the event ?</label>
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="message"></textarea>
    </div>
  </div>

    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>

  <button type="submit" class="btn btn-primary" name='uploadFeed'>Upload</button>
</form>

