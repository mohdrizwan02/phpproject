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
           
            
      }
        /* Set height of carousel to half the window height */
        .half-height-carousel {
            height: 80vh; /* 50% of viewport height */
            width: 100%; /* 50% of viewport width */
            margin: 0 auto; /* Center the carousel */
        }
        /* Center carousel content vertically */
        .carousel-item > img {
            object-fit: cover;
            height: 80vh;
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
</style> 



   
   
  </head>
  <body><header>
    <?php
    session_start();
     require 'essentials/_navbar.php';
     
    include 'essentials/_dbconnect.php';
    
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
    if(isset($_SESSION['peterror'])) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> search for a valid pet
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
          <img src="https://source.unsplash.com/random/900×700/?pets" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/random/900×700/?lions" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/random/900×700/?tigers" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
<main>
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

  <div class="container mt-3">
       <h2 style="font-family:'Playfair Display', serif;text-align:center;"><b>Animal care,tips and more on our blog</b></h2>
       <div class="row">
        <?php
          $sqlb="SELECT * FROM `blogs`;";
          $resultb=mysqli_query($conn,$sqlb);
          while($rowb=mysqli_fetch_array($resultb)) {
            $blogid=$rowb["BLOGID"];
          echo '<div class="col-4 mt-4 ">
                  <div class="card" style="width: 22rem;height=30rem; ">
                    <img src="essentials/image.php?blogid='.$blogid.'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">'.$rowb['BLOGTITLE'] .'</h5>
                      <p class="card-text">'./*$rowb['BLOGDESC']*/ '</p>
                      <a href="blog.php?blogid='.$blogid.'" class="btn btn-primary ">READ THE BLOG POST</a>
                    </div>
                  </div>
            </div>';
          }
        ?> 
        </div>
  </div>
  <div class="container-fluid bg-dark text-white mt-5" id="about">
      <div class="row m-0 " style="padding-right:80px">
        <div class="col-6">
          
            <img src="essentials/aboutdog.png" alt="about website logo" height=500px width=500px style="margin-top:80px;margin-left:50px;margin-bottom:50px">
        </div>
        <div class="col-6" style="margin-top:80px ">
            <div class="card  bg-dark border-dark" >
              <div class="card-body text-white">
                 <h2 class="card-title"> <div class="container mt-0 ">
                   <img src="essentials/happypets.png"  alt="Happy Pet Store Logo" style="max-width: 350px; height: auto;">
                </div>
                <h5 class="card-text mt-3">Welcome to Happy Pets, where wagging tails and purring companions await you! At Happy Pets, we're dedicated to matching loving homes with furry friends in need. Whether you're looking for a playful pup, a cuddly kitten, or a gentle giant, we have a diverse range of pets eagerly awaiting adoption. Our mission is to make both pets and owners equally happy, ensuring each adoption is a perfect match. With our user-friendly website and dedicated team, finding your new best friend has never been easier. Join us at Happy Pets and let's make tails wag and hearts purr together!</h5>
                <a href="about.php" class="btn btn-light mt-3">Know More</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>





<footer class="bg-body-tertiary text-center text-lg-start bg-dark mt-0 text-white"  >
  <!-- Copyright -->
  <div class="text-center p-3" >
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>



  
 
  

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