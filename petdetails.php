<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      div.scroll-container {
      background-color: #333;
      overflow: auto;
      white-space: nowrap;
      padding: 0px;
      margin:20px;
    }

      div.scroll-container img {
      padding: 10px;
      height:400px;
      width:400px;
    }
    </style>
    <style>
      .setheight{
        min-height:604px;
      }
    </style>
  </head>
  <body>
    <div class="setheight">
  <?php
    session_start();
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
     require 'essentials/_navbar.php';
     
    include 'essentials/_dbconnect.php';
    
   
    ?>
    <?php
    $petid=$_GET['petid'];
    $sqlp="SELECT * FROM `pets` WHERE PETID='$petid';";
    $resultp=mysqli_query($conn,$sqlp);
    $rowp=mysqli_fetch_array($resultp);
    $petid=$rowp["PETID"];
    $petname=$rowp["PETNAME"];
    $petgender=$rowp["PETGENDER"];
    $petage=$rowp["PETAGE"];
    $city=$rowp["CITY"];
    $state=$rowp["STATE"];
    $name=$rowp["NAME"];
    $phone=$rowp["PHONE"];
    $sprayed=$rowp["PETSPRAY"];
    $petbreed=$rowp["PETBREED"];
    $vaccine=$rowp["PETVACCINE"];
    $neuter=$rowp["PETNEUTER"];
    $shots=$rowp["PETSHOTS"];
    $gdogs=$rowp["GOODDOGS"];
    $gcats=$rowp["GOODCATS"];
    $gkids=$rowp["GOODKIDS"];
    $reason=$rowp["PETREASON"];
    $pincode=$rowp["PINCODE"];
    $petextra=$rowp["PETEXTRA"];

    ?>
    <div class="container mt-3">
      <h3 style="text-align:center"><b>Adopt <?php echo $petname?></b></h3>
      <div class="row">
        <div class="col">
        <a href="pets.php?pet=<?php echo $_SESSION['pet']?>" style="text-align:left;"><p>Back to Results</p></a>
        </div>
        <div class="col">
        <p style="text-align:right;"><?php echo 'timestamp';?></p>
        </div>
      </div>
      <h3>heyy!! My name is <?php echo $petname?>
      <div class="scroll-container">
        <img src="<?php echo 'essentials/petshow1.php?petid='.$petid;?>" alt="Cinque Terre">
        <img src="<?php echo 'essentials/petshow2.php?petid='.$petid;?>" alt="Forest">
        <img src="<?php echo 'essentials/petshow3.php?petid='.$petid;?>" alt="Northern Lights">
        <img src="<?php echo 'essentials/petshow4.php?petid='.$petid;?>" alt="Mountains">
        <img src="<?php echo 'essentials/petshow5.php?petid='.$petid;?>" alt="Mountains">
        <img src="<?php echo 'essentials/petshow6.php?petid='.$petid;?>" alt="Mountains">
      </div>
      <hr>
      <h3 style="margin-top:25px;">About Me</h3>
      <div class="row">
        <div class="col-3">
          <h4 style="margin-top:15px;"><b>Breed:</b><h4>
          <h4 style="margin-top:15px;"><b>Vaccinated:</b><h4>
          <h4 style="margin-top:15px;"><b>Age:</b><h4>
          </div>
        <div class="col-3">
          <?php
          echo '<h4 style="margin-top:15px;">'.$petbreed.'<h4>
          <h4 style="margin-top:15px;">'.$vaccine.'<h4>
          <h4 style="margin-top:15px;">'.$petage.'<h4>';
          ?>
        </div> 
        <div class="col-3">
          <h4 style="margin-top:15px;"><b>Gender:</b><h4>
          <h4 style="margin-top:15px;"><b>PetId:</b><h4>
          <h4 style="margin-top:15px;"><b>Neutered:</b><h4>
        </div>
        <div class="col-3">
        <?php
          echo '<h4 style="margin-top:15px;">'.$petgender.'<h4>
          <h4 style="margin-top:15px;">'.$petid.'<h4>
          <h4 style="margin-top:15px;">'.$neuter.'<h4>';
          ?>
        </div>
      </div>
      <hr>
      <h3 style="margin-top:25px;">My Info</h3>
      <div class="row">
        <div class="col-4">
          <?php
        echo '<h4 style="margin-top:15px;">'.$sprayed.'<h4>
          <h4 style="margin-top:15px;">'.$gcats.'<h4>';
          
          ?>
        </div>
        <div class="col-4">
          <?php
        echo '<h4 style="margin-top:15px;">'.$shots.'<h4>
          <h4 style="margin-top:15px;">'.$gdogs.'<h4>
         ';?>
        </div>
        <div class="col-4"><?php
        echo '<h4 style="margin-top:15px;">Needs Loving Adopter<h4>
          <h4 style="margin-top:15px;">'.$gkids.'<h4>
          ';?>
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
    </div> 
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white " style="width: 100%; padding: 20px 0;height:70px;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>

  </body>
</html>