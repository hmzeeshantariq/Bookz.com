<?php require('conn.php'); ?>

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
  <h2 class="text-center " style="padding: 10px; margin-top: 1em;">Bookz !</h2>
  <?php

    if(isset($_GET["submit"])){

    $bid = $_GET["bid"];
    
    $sql = "SELECT * FROM books where bid='$bid'";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($recordsFound)
    {
      $bid = $row["bid"];
      $book = $row["bname"];
      $author = $row["author"];
      $pdate = $row["pdate"];
    }

    echo "
  <div class=\"col-md-4 offset-md-4\">
    <div class=\"mt-5\">
      <div class=\"card\">
      <h5 class=\"card-header\">$book</h5>
      <div class=\"card-body\">
        <p class=\"card-text\">Book ID: $bid</p>
        <p class=\"card-text\">Author: $author</p>
        <p class=\"card-text\">Published in: $pdate</p>
        <a class=\"btn btn-primary\" onclick=\"myfunction()\">Borrow</a>
      </div>
      <div class=\"card-footer text-muted\">Book must be returned within 14 days</div>
      </div>      
    </div>
  </div>";
}
?>

<script>
  function myfunction(){
    alert('Book Successfully Borrowed');
  }
</script>
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