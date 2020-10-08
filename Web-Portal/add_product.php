
<?php

session_start();
include("connection.php");
$mysqli =  new mysqli($db_host,$db_user,$db_pass,$db_name);

$err = 0;
$errcode = 0;
$errmsg = "";
if(!$mysqli) {
	echo "Connection Failed : ".$mysqli->connect_error;
	exit();
}
$log_in = 0;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'type_farmer') {
   $log_in = 1;
} else {
    header('Location:./sign_in.html');
}
$uploads_dir = 'product_image/';
$fileName = $_FILES['product_image']['name'];
$uploadOk=0;
//echo $fileName;
$valid_files = ['jpg','png','jpeg'];
$tmp = explode('.', $fileName);
$fileExtension = end($tmp);
//echo $fileExtension;
if (! in_array($fileExtension,$valid_files)) {
    $uploadOk = 1;
}

if (is_uploaded_file($_FILES['product_image']['tmp_name']) && $uploadOk == 0 && $log_in == 1)
{       
    //in case you want to move  the file in uploads directory
     move_uploaded_file($_FILES['product_image']['tmp_name'], $uploads_dir.$fileName);
     //echo 'moved file to destination directory';
}
else {
    header('Location:./add_product.html');
}

$f_name = $_SESSION['user_email'];
$p_name = $_POST['product_name'];
$p_quantity = $_POST['product_quantity'];
$p_price = $_POST['product_price'];
$p_desc = $_POST['product_desc'];
$p_image = $uploads_dir.$fileName;

if(!is_null($p_name) && !is_null($p_quantity) && !is_null($p_price) && !is_null($p_desc)&& !is_null($p_image)&& !is_null($f_name)) {
    $stmtc = $mysqli->prepare("INSERT INTO product_details (farmer_name,product_name,product_quantity,product_price,product_desc,product_image) VALUES (?, ?, ?, ?, ?,?)");
	$stmtc->bind_param("ssssss",$f_name,$p_name,$p_quantity,$p_price,$p_desc,$p_image);
	if ( !$stmtc->execute()) {
	   echo "Error : ". $mysqli->error;
	   $err = 1;
	   echo "<b> Something went wrong.<br /> Please contact developer </b>";
	   $errcode = 4;
	   $stmtc->close();
	}
	else {
	    header('Location:./home.php');
    }
}
else {
    header('Location:./add_product.html');
}

?>

