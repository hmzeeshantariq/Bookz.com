<?php require('conn.php'); ?>

<?php
  session_start();
  $id = $_SESSION["id"];
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
      <form action="settings.php" method="GET">
        <?php echo "<input type = \"hidden\" name = \"id\" value = $id>"; ?>
        <button type="submit" class="btn btn-success" name="submit">Update Profile</button>
      </form>
    </div><br>
    <h2 class="text-center text-primary font-weight-bold" style="padding: 10px; margin-top: 1em;">Welcome !</h2>
  <div style="margin-top: 2em;">
    <h2>Books Available</h2>

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Book</th>
        <th>Author</th>
        <th>Published in</th>
      </tr>
    </thead>
    <?php 
      $sql = "SELECT * FROM books";
      $result = mysqli_query($conn, $sql);
      $i = 0;
      while($row = mysqli_fetch_assoc($result)){
        $i++;
        $bid = $row["bid"];
        $book = $row["bname"];
        $author = $row["author"];
        $pdate = $row["pdate"];
        if($id == 007){
        echo"<tbody>
            <tr>  
            <form method=\"GET\" action=\"getBook.php\">
              <input type = \"hidden\" name = \"bid\" value = \"$bid\"/>
              <td><label name=\"$bid\">$bid</td>
              <td>$book</td>
              <td>$author</td>
              <td>$pdate</td>
              <td><button type=\"submit\" class=\"btn btn-default\" name=\"submit\">Get Book</button></td>
            </form>
            </tr>
          </tbody>";
        }
        else if ($i%2 == 0){
          echo"<tbody>
            <tr>  
            <form method=\"GET\" action=\"getBook.php\">
              <input type = \"hidden\" name = \"bid\" value = \"$bid\"/>
              <td><label value=\"$bid\">$bid</td>
              <td>$book</td>
              <td>$author</td>
              <td>$pdate</td>
              <td><button type=\"submit\" class=\"btn btn-default\" name=\"submit\">Get Book</button></td>
            </form>
            </tr>
          </tbody>";
        }
      }?>
  </table>
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


