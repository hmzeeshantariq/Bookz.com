<?php require('conn.php'); ?>

<?php
	session_start();
?>

<?php 
	
	if(isset($_REQUEST["submit"])){	
		$id = $_REQUEST["id"];
		$pass = $_REQUEST["pass"];
		
		$sql = "SELECT * FROM users where sysId='$id' and pass='$pass'";
		$result = mysqli_query($conn, $sql);
	   	$recordsFound = mysqli_num_rows($result);
	   if($recordsFound)
	   {
	   	$_SESSION["id"] = $id;
		 header('Location: home.php');
	   }
	   else{
	   	$invalidPass = "Id or password is incorrect";
	   }
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
  <h2 class="text-center" style="margin-top: 2em;">Bookz !</h2>
    <div class="col-md-4 offset-md-4">
      <div class="mt-5">
        <form method="GET">
          <div class="form-group">
            <label>User Id</label>
            <input class="form-control" name="id" id="id">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pass">
          </div>
          <?php 
          	if(isset($invalidPass))
          		echo "<p style=\"color: red;\">".$invalidPass."</p>";
           ?>
          <button type="submit" class="btn btn-default" name="submit">Submit</button>
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