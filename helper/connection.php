<?php
include 'CONSTANT.php';
$con = mysqli_connect(HOST,UNAME,PASS,DB);

// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// echo "sukses";
?>