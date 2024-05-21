<?php
 session_start();
if(!isset($_SESSION['login'])) {
     header("location:login.php");
 }
 include '_dbconnect.php';
 if(isset($_GET['id'])){
    $blogid=$_GET['id'];
    $dquery="DELETE FROM `blogs` WHERE `blogs`.`BLOGID` ='$blogid';";
    $dresult=mysqli_query($conn,$dquery);
    if($dresult){
        
        $_SESSION['blogdeleted']=true;
        header("location:/phpproject/myblogs.php");
    }
 }
 ?>