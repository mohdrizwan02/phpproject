<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location:login.php");
  }
include '_dbconnect.php';
$blogid=$_GET['blogid'];
$sqlimage="SELECT * FROM `blogs` WHERE BLOGID='$blogid';";
$resultimage=mysqli_query($conn,$sqlimage);
$rowimage=mysqli_fetch_array($resultimage);
$image=$rowimage['BLOGIMAGE'];
echo $image;
?>