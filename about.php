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
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
      <div class="row">
        <div class="col-md-6" style="border:2px solid black;margin-top:50px;border-radius:4px;padding-left:20px;margin-left:50px;margin-bottom:50px">
          <h4>
          At Happy Pets, our mission is to connect loving homes with pets in need, creating happier lives for both animals and humans alike.
          </h4>
            <p>
              Happy Pets was born out of a deep love for animals and a desire to make a positive impact on their lives. Our founder, [Founder's Name], experienced firsthand the joy that comes from adopting a pet in need and wanted to create a platform that makes it easier for others to experience that same joy. Thus, Happy Pets was created with the vision of becoming a central hub for pet adoption, where animals find forever homes and families find lifelong companions.
            </p>
            <hr>
            <h5>OUR VALUES</h5>
            <li><b>Compassion:</b> We believe in treating every animal with kindness, respect, and empathy.</li>
            <li><b>Integrity:</b> We uphold the highest standards of honesty and transparency in all our interactions.</li>
            <li><b>Commitment to Animal Welfare:</b> We are dedicated to promoting the well-being and happiness of animals in our care.</li>
            <li><b>Community:</b> We foster a supportive community of pet lovers who share our passion for animal adoption and advocacy.</li>
            <h5></h5>
              <li><b>Pet Listing:</b> Users can list pets available for adoption, providing detailed information and photos to help potential adopters find their perfect match.</li>
              <li><b>Adoption Search:</b> Prospective pet owners can search our database of available pets based on criteria such as species, breed, age, and location.</li>
              <li><b>Connection with Shelters and Rescues:</b> We partner with shelters and rescue organizations to feature their adoptable pets on our platform, expanding the reach of their adoption efforts.</li>
              <li><b>Adoption Facilitation:</b> We provide resources and guidance to help streamline the adoption process, ensuring a smooth transition for both pets and their new families.</li>
              <hr>           
              <h5 style="margin-top:15px">MEET OUR TEAM</h5>
              <li><b>MOHAMMAD RIZWAN</b></li>
              <li><b>SONGA VAMSHI</b></li>
              <li><b>MANGALI SHASHANK</b></li>
              <li><b>MANDULA AAKASH</b></li>
              
        </div>
          <div class="col-md-4">
            <img src="https://source.unsplash.com/random/500×500/?pets" height=auto width=500px style="margin-top:50px;padding-left:10px;margin-left:30px;margin-bottom:50px">
          </div>
      </div>
   
    
   
<footer class="bg-body-dark text-center text-lg-start bg-dark mt-0 text-white"  >
  <!-- Copyright -->
  <div class="text-center p-3" >
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
</div>
  </body>
</html>