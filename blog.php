<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("location:login.php");
    }
    require 'essentials/_navbar.php';
    
    include 'essentials/_dbconnect.php';
    
    
    $blogid=$_GET['blogid'];
    $sqlb="SELECT * FROM `blogs` WHERE BLOGID='$blogid';";
    $resultb=mysqli_query($conn,$sqlb);
    $rowb=mysqli_fetch_array($resultb);
    $blogtitle=$rowb['BLOGTITLE'];
    $blogdesc=$rowb['BLOGDESC'];
    $blogusername=$rowb['BLOGUSERNAME'];
    $blogtime=$rowb['BLOGTIMESTAMP'];
    $sqlu="SELECT * FROM `details` WHERE USERNAME='$blogusername';";
    $resultu=mysqli_query($conn,$sqlu);
    $rowu=mysqli_fetch_array($resultu);
    $blogfirstname=$rowu['FIRSTNAME'];
    $bloglastname=$rowu['LASTNAME'];
    $bloguserid=$rowu['ID'];
    $blogphone=$rowu['PHONE'];
?>
<div class="container mt-4 mb-5">
    <div class="row">
        <!-- Blog Title -->
        <div class="col-lg-12">
            <h2 class="mb-4"><?php echo $blogtitle;?></h2>
        </div>
        <!-- Border for Description and Image -->
        <div class="col-lg-12 border border-white p-3">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Description -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text"><?php echo $blogdesc;?></p>
                            <p class="card-text"><small class="text-muted">Posted by <?php echo $blogfirstname.' '.$bloglastname.' on '.$blogtime;?></small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 " style="">
                <div class="card mb-2">
                    <div class="row">
                        <div class="col-4">
                            <img src="essentials/profileimage.php?id=<?php echo $bloguserid;?>" style="width:130px;height:130px;border-radius:50%;margin:10px;">
                        </div>
                        <div class="col-8" style="">
                            <h5 style="margin-left:20px;margin-top:10px;"><?php echo $blogusername;?></h5>
                            <h5 style="margin-left:20px;"><?php echo $blogfirstname.' '.$bloglastname;?></h5>
                            <h5 style="margin-left:20px;"><?php echo $blogphone?></h5>
                        </div>
                    </div>
                </div>
                    <!-- Blog Image -->
                    <div class="card mb-3">
                        <img src="essentials/blogimage.php?blogid=<?php echo $blogid;?>" class="card-img-top" alt="Blog Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white fixed-bottom" style="width: 100%; padding: 20px 0;height:70px;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
  </body>
</html>