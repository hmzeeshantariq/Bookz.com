<?php require('conn.php'); ?>


<?php
  if(isset($_REQUEST["submit"]) && !isset($_REQUEST["updateSubmit"])){
    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM users where sysId='$id'";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    if($recordsFound)
    {
      $row = mysqli_fetch_assoc($result);
      
      $id = $row["sysId"];
      $uname = $row["uname"];
      $pass = $row["pass"];
      $phone = $row["phone"];
      $email = $row["email"];
      $getData = true;
    }
  }

  if(isset($_REQUEST["updateSubmit"])){
    if(isset($_REQUEST["uname"])&& isset($_REQUEST["email"])&& isset($_REQUEST["pass"])&& isset($_REQUEST["number"]))
    {
      $id = $_REQUEST["id"];
      $uname = $_REQUEST["uname"];
      $email = $_REQUEST["email"];
      $pass = $_REQUEST["pass"];
      $number = $_REQUEST["number"];
      $sql = "UPDATE users SET uname='$uname', pass='$pass', phone='$number', email='$email' WHERE sysId='$id'";
      if ($conn->query($sql) === TRUE) { 
        echo "<script type='text/javascript'>alert('Record Updated Successfully');</script>";
       } else { 
        echo "<script type='text/javascript'>alert('Record cannot be Updated');</script>";
       }

      $conn->close();
    }
    else { $invalidPass = "Empty credential(s) found";}
  }

 ?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Page Title -->
    <title>Open Redirect</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="float-right" style="margin-top: 40px;">
      <a class="btn btn-success" href="home.php" role="button">Home</a>
    </div>
    </div>
    <br>
  <h2 class="text-center" style="margin-top: 2em;">Update Profile</h2>
    <div class="col-md-4 offset-md-4">
      <div class="mt-5">
        <form method="GET">
          <div class="form-group">
            <label for="id">Id</label>
            <input class="form-control" id="id" name="id" value= <?php if (isset($getData)) {echo "$id";} ?>>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="uname" id="name" value= <?php if (isset($getData)) {echo "$uname";} ?>>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input class="form-control" id="pwd" name="pass" value= <?php if (isset($getData)) echo "$pass"; ?>>
          </div>
          <div class="form-group">
            <label>Contact Number</label>
            <input class="form-control" name="number" id="number" value= <?php if (isset($getData)) echo "$phone"; ?>>
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" name="email" id="email" value= <?php if (isset($getData)) echo "$email"; ?>>
          </div>
          <?php 
            if(isset($invalidPass))
              echo "<p style=\"color: red;\">".$invalidPass."</p>";
           ?>
          <button type="submit" class="btn btn-default" name="updateSubmit">Submit</button>
        </form>
      </div>
    </div>
    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
</body>
</html>