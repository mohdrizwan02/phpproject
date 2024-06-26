<?php session_start();
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
    <style>
      body {
          margin:0;
          padding:0; 
            
      }
        /* Set height of carousel to half the window height */
        .half-height-carousel {
            height: 100vh; /* 50% of viewport height */
            width: 100%; /* 50% of viewport width */
            margin: 0 auto; /* Center the carousel */
        }
        /* Center carousel content vertically */
        .carousel-item > img {
            object-fit: cover;
            height: 100vh;
            width: 100%;
        }
    </style>
   <style>
  /* Custom styles */
  .grid-item {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s; /* Smooth transition on hover */
  }

  .grid-item img {
    width: 100%;
    height: auto;
    transition: transform 0.3s; /* Smooth transition on hover */
  }

  .grid-item .btn {
    position: absolute;
    bottom: 10px; /* Adjust button position from bottom */
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    opacity: 0; /* Hide button by default */
    transition: opacity 0.3s;
  }

  .grid-item:hover {
    transform: scale(1.1); /* Enlarge on hover */
  }

  .grid-item:hover .btn {
    opacity: 1; /* Show button on hover */
  }
  a{
    text-decoration:none ;
    color:white;

  }
  .masthead {
  padding-top: 10.5rem;
  padding-bottom: 6rem;
  text-align: center;
  color:white;
  background-image: url("essentials/rehome.jpg");
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center center;
  background-size: cover;
}
.masthead .masthead-subheading {
  font-size: 1.5rem;
  font-style: italic;
  line-height: 1.5rem;
  margin-bottom: 25px;
  font-family: "Roboto Slab",  "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}
.masthead .masthead-heading {
  font-size: 3.25rem;
  font-weight: 700;
  line-height: 3.25rem;
  margin-bottom: 2rem;
  font-family: "Montserrat", "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
} 
</style> 
<style>
  .setheight{
        min-height:604px;
      }
        .about-section {
            margin-top: 5rem;
        }
        .about-img {
            width: 100%;
            max-width: 500px; /* Ensure the image does not exceed this width */
            height: auto;
            margin-top: 80px;
            margin-bottom: 50px;
        }
        .about-card {
            margin-top: 80px;
        }
        .about-card-body {
            background-color: #343a40; /* Dark background for the card body */
            border-color: #343a40;
        }
        .about-card-text {
            color: white;
        }
        .about-logo {
            max-width: 350px;
            height: auto;
        }
        @media (max-width: 767.98px) {
            .about-card {
                margin-top: 20px;
            }
            .about-img {
                margin-top: 20px;
                max-width: 100%; /* Ensure the image scales down on small screens */
            }
        }
    </style>
 </head>
  <body>
  <div class="setheight">  
  <header>
    <?php
    // session_start();
     
    
    // if(!isset($_SESSION['login'])) {
    //   header("location:login.php");
    // }
    require 'essentials/_navbar.php';
    include 'essentials/_dbconnect.php';
    if(isset($_SESSION['blogadded'])){
      if($_SESSION['blogadded']==true){
        echo '<div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <strong>success!</strong>Your blog has been successfully added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['blogadded']);
      }
    }
    if(isset($_SESSION['peterror'])) {
      echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
        <strong>Sorry!</strong> search for a valid pet'.$_SESSION['pet'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['peterror']);
    }
    ?>
    </header><?php
      
      
     ?>
     
    <div id="carouselExampleSlidesOnly" class="carousel slide half-height-carousel " data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="essentials/car1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="essentials/car2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="essentials/car3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
<main style="">
  <div class="container mt-3">
  <h2 style="font-family:'Playfair Display', serif;text-align:center;text-decoration:underline"><b>ADOPT A PET NOW</b></h2>
    <div class="container py-3">
      <div class="row">
        <!-- First Grid -->
        <div class="col-md-4">
          <div class="grid-item">
            <img src="essentials/dog.png" alt="Grid 1">
            <a href="pets.php?pet=dogs"><button class="btn">Dogs</button></a>
          </div>
        </div>

        <!-- Second Grid -->
        <div class="col-md-4">
          <div class="grid-item">
            <img src="essentials/cat.jpg" alt="Grid 2">
            <a href="pets.php?pet=cats"><button class="btn">Cats</button></a>
          </div>
        </div>

        <!-- Third Grid -->
        <div class="col-md-4">
          <div class="grid-item">
            <img src="essentials/birds.jpg" alt="Grid 3">
            <a href="pets.php?pet=birds"><button class="btn">Birds</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <hr>
    <div class="masthead">
            <div class="container">
                <div class="masthead-heading"><b>Re-Home a Pet</b></div>
                <div class="masthead-subheading text-uppercase"></b>Every Pet Deserves a Good Home. #Adoptlove</b></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="rehome-a-pet.php">Re-Home a Pet</a>
            </div>
  </div>
    <hr>

    <div class="container mt-3">
    <div class="row">
    <div class="col-7 d-flex align-items-center justify-content-end">
        <h2 style="font-family:'Playfair Display', serif;"><b>Animal care, tips, and more on our blog</b></h2>
    </div>
    <div class="col-5 d-flex align-items-center justify-content-end">
        <h4 style="font-family:'Playfair Display', serif;margin-right:5px;">Contribute to our community</h4>
        <button type="button" class="btn btn-dark  ml-2" style="font-family:'Playfair Display', serif; background-color: #000; color: #fff;" onmouseover="this.style.backgroundColor='#fff'; this.style.color='#000'; this.style.textDecoration='underline';" onmouseout="this.style.backgroundColor='#000'; this.style.color='#fff'; this.style.textDecoration='none';" onclick="openaddblogpage()">
    <a href="addblog.php" style="color: inherit; text-decoration: none;">Add a Blog</a>
</button>

    </div>
</div>
  <div class="row">
    <?php
      $sqlb="SELECT * FROM `blogs`;";
      $resultb=mysqli_query($conn,$sqlb);
      while($rowb=mysqli_fetch_array($resultb)) {
        $blogid=$rowb["BLOGID"];
        echo '<div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="card h-100">
                  <img src="essentials/blogimage.php?blogid='.$blogid.'" class="card-img-top" alt="..." style="max-height:240px;">
                  <div class="card-body" style="height: 200px;">
                    <h5 class="card-title">'.$rowb['BLOGTITLE'].'</h5>
                    <p class="card-text">'/*.$rowb['BLOGDESC'].*/.'</p>
                    <a href="blog.php?blogid='.$blogid.'" class="btn btn-primary">READ THE BLOG POST</a>
                    <p class="card-text" style="margin-top:15px;"><small class="text-muted">'.$rowb['BLOGUSERNAME'].' '.$rowb['BLOGTIMESTAMP'].'</small></p>
                  </div>
                </div>
              </div>';
      }
    ?> 
  </div>
</div>

<div class="container-fluid bg-dark text-white about-section" id="about">
        <div class="row m-0">
            <div class="col-12 col-md-6  d-flex justify-content-center">
                <img src="essentials/aboutdog.png" alt="about website logo" class="about-img">
            </div>
            <div class="col-12 col-md-6 about-card">
                <div class="card about-card-body">
                    <div class="card-body">
                        <div class="container mt-0">
                            <img src="essentials/happypets.png" alt="Happy Pet Store Logo" class="about-logo">
                        </div>
                        <h5 class="card-text about-card-text mt-3">Welcome to Happy Pets, where wagging tails and purring companions await you! At Happy Pets, we're dedicated to matching loving homes with furry friends in need. Whether you're looking for a playful pup, a cuddly kitten, or a gentle giant, we have a diverse range of pets eagerly awaiting adoption. Our mission is to make both pets and owners equally happy, ensuring each adoption is a perfect match. With our user-friendly website and dedicated team, finding your new best friend has never been easier. Join us at Happy Pets and let's make tails wag and hearts purr together!</h5>
                        <a href="about.php" class="btn btn-light mt-3">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>  




<footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white" style="width: 100%; padding: 20px 0;height:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>



  
 
  <script>
    function openaddblogpage() {
        window.location.href = 'addblog.php';
    }
</script>


    <!-- Optional JavaScript; choose one of the two! -- style="background-color: rgba(0, 0, 0, 0.05); color: white;"-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>