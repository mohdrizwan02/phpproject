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
    require 'essentials/_navbar.php';
    
    include 'essentials/_dbconnect.php';
    
    if(!isset($_SESSION['login'])) {
        header("location:login.php");
    }
    $blogid=$_GET['blogid'];
    $sqlb="SELECT * FROM `blogs` WHERE BLOGID='$blogid';";
    $resultb=mysqli_query($conn,$sqlb);
    $rowb=mysqli_fetch_array($resultb);
    $blogtitle=$rowb['BLOGTITLE'];
    $blogdesc=$rowb['BLOGDESC'];
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Blog Title -->
        <div class="col-lg-12">
            <h2 class="mb-4"><?php echo $blogtitle;?></h2>
        </div>
        <div class="col-lg-8">
            <!-- Blog Description -->
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?php echo $blogdesc;?></p>
                    <p class="card-text"><small class="text-muted">Posted by John Doe on January 1, 2024</small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Blog Image -->
            <div class="card mb-3">
                <img src="essentials/blogimage.php?blogid=<?php echo $blogid;?>" class="card-img-top" alt="Blog Image">
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
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark   ">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: white;">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
  </body>
</html>