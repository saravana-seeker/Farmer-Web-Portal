<?php

include("connection.php");
$mysqli =  new mysqli($db_host,$db_user,$db_pass,$db_name);

$err = 0;
$errcode = 0;
$errmsg = "";
if(!$mysqli) {
	echo "Connection Failed : ".$mysqli->connect_error;
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Farmer</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="home.css">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-inverse" style="background:#a0d413;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Farmer Gateway</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="add_product.html">Add Product</a></li>
        <li class=""><a href="show_product.php">View Products</a></li>
                <li class=""><a href="contact_form.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sign_up.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="sign_in.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<center>
<div class="container">
<div class="row">
<?php
$stmtc = $mysqli->prepare("SELECT * FROM product_details");
$stmtc->execute();
$result = $stmtc->get_result();
$r=1;
if ($result->num_rows >= 1) {
    while($row = $result->fetch_assoc()) {
      $farmer_name = $row['farmer_name'];
      $product_name = $row['product_name'];
      $product_price = $row['product_price'];
      $product_quantity = $row['product_quantity'];
      $product_desc = $row['product_desc'];
      $product_image = $row['product_image'];
      if ($r==5){
        exit();
      }
      else{
      $r = $r+1;
      echo '
            <div class="col-md-3">
            <a href="#">
            <img class="thumbnail" src="'.$product_image.'" alt="Slate Bootstrap Admin Theme" />
            </a>
            <h3 style="color:orange">'.$product_name.'</h3>
            <h5><label style="color:magenta;">Quantity : </label> '.$product_quantity.'</h5>
            <h5><label style="color:magenta;">Price : </label> '.$product_price.'</h5>
            <h4><a href="#">Buy</a></h4><br />
            </div>';
       }
   }
}
else{
  $stmtc->free_result();
  $stmtc->close();
}
	
?>
</div>
</center>
 <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="background:#a0d413;padding:1%;">
    <h3>Created and Designed By Saravana</h3>© 2020 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> Farmer Gateway</a>
  </div>
<!-- Footer -->
</body>
</html>

