<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location:login.php");
  }
include '_dbconnect.php';
$imageid=$_GET['id'];
$sqlimage="SELECT * FROM `details` WHERE ID='$imageid';";
$resultimage=mysqli_query($conn,$sqlimage);
$rowimage=mysqli_fetch_array($resultimage);
$image=$rowimage['PROFILEPHOTO'];
echo $image;
?>