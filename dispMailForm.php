<form action="sendMail.php" method="POST" enctype="multipart/form-data">
    <!-- <h3>Start sharing your feelings !</h3> -->
    <div class="alert alert-primary" role="alert">
      You can send mail to your collegue by entering their mail.
    </div>
    <br>

  <div class="form-group">
    <label for="exampleInputEmail1">Receiver Mail</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Whom do you wanna send mail to ?" name="reMail">
    <small id="emailHelp" class="form-text text-muted">Enter your friends email</small>
  </div>

  <div class="form-group">
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Mail Body</label>
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="message"></textarea>
    </div>
  </div>

  <button type="submit" class="btn btn-primary" name='sendMail'>Send</button>
</form>