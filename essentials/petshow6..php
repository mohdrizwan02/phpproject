<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location:login.php");
  }
include '_dbconnect.php';
$petid=$_GET['petid'];
$sqlimage="SELECT * FROM `pets` WHERE PETID='$petid';";
$resultimage=mysqli_query($conn,$sqlimage);
$rowimage=mysqli_fetch_array($resultimage);
$image=$rowimage['IMG6'];
echo $image;
?>