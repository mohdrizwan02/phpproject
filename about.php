<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ABOUT US</title>
    <style>
        #petlogo {
            filter: invert(100%) brightness(0%);
        }
    </style>
</head>
<body>
<?php
    session_start();
    
    if(!isset($_SESSION['login'])) {
    header("location:login.php");
    }
    require 'essentials/_navbar.php';
    include 'essentials/_dbconnect.php';
?>
<div class="container-fluid mb-5 pb-3 pt-3">
    <div class="row border border-2 rounded border-dark p-3 m-3">
        <div class="col-lg-8 col-md-12">
            <h4>At Happy Pets, our mission is to connect loving homes with pets in need, creating happier lives for both animals and humans alike.</h4>
            <p>Happy Pets was born out of a deep love for animals and a desire to make a positive impact on their lives. Our founder, [Founder's Name], experienced firsthand the joy that comes from adopting a pet in need and wanted to create a platform that makes it easier for others to experience that same joy. Thus, Happy Pets was created with the vision of becoming a central hub for pet adoption, where animals find forever homes and families find lifelong companions.</p>
            <hr>
            <h5>OUR VALUES</h5>
            <ul>
                <li><b>Compassion:</b> We believe in treating every animal with kindness, respect, and empathy.</li>
                <li><b>Integrity:</b> We uphold the highest standards of honesty and transparency in all our interactions.</li>
                <li><b>Commitment to Animal Welfare:</b> We are dedicated to promoting the well-being and happiness of animals in our care.</li>
                <li><b>Community:</b> We foster a supportive community of pet lovers who share our passion for animal adoption and advocacy.</li>
            </ul>
            <h5>OUR SERVICES</h5>
            <ul>
                <li><b>Pet Listing:</b> Users can list pets available for adoption, providing detailed information and photos to help potential adopters find their perfect match.</li>
                <li><b>Adoption Search:</b> Prospective pet owners can search our database of available pets based on criteria such as species, breed, age, and location.</li>
                <li><b>Connection with Shelters and Rescues:</b> We partner with shelters and rescue organizations to feature their adoptable pets on our platform, expanding the reach of their adoption efforts.</li>
                <li><b>Adoption Facilitation:</b> We provide resources and guidance to help streamline the adoption process, ensuring a smooth transition for both pets and their new families.</li>
            </ul>
            <hr>
            <h5>MEET OUR TEAM</h5>
            <ul>
                <li><b>MOHAMMAD RIZWAN</b></li>
                <li><b>SONGA VAMSHI</b></li>
                <li><b>MANGALI SHASHANK</b></li>
                <li><b>MANDULA AAKASH</b></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="img-container mb-3">
                <img src="essentials/petstorelogo.png" class="img-fluid" id="petlogo" alt="Pet Image 1">
            </div>
            <div class="img-container">
                <img src="essentials/aboutimg.jpg" class="img-fluid" alt="aboutimg">
            </div>
        </div>
    </div>
</div>

<footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white fixed-bottom" style="width: 100%;padding-top:20px;height:70px;margin-top:150px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>