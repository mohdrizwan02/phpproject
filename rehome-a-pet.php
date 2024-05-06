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


<div class="container mt-5">
    <h1 class="text-center">Rehome a Pet</h1>
    <form>
        <div class="row ">
            <div class="col-md-6 mt-3">
                <!-- Pet Details -->
                <div class="form-group">
                    <label for="petName" style="margin-bottom:8px;">Pet's Name</label>
                    <input type="text" class="form-control" id="petName" placeholder="Enter pet's name" required>
                </div>
                <div class="form-group mt-3">
                    <label for="petType" style="margin-bottom:8px;">Pet Type</label>
                    <select class="form-control" id="petType" required>
                        <option>Dog</option>
                        <option>Cat</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="petBreed" style="margin-bottom:8px;">Pet Breed</label>
                    <input type="text" class="form-control" id="petBreed" placeholder="Enter pet's breed" required>
                </div>
                <div class="form-group mt-3">
                    <label for="petAge" style="margin-bottom:8px;">Age of your Pet</label>
                    <select class="form-control" id="petAge" required>
                        <option>Puppyhood (Up to 6 Months)</option>
                        <option>Adolescence (6 - 18 Months)</option>
                        <option>Adulthood (1.5 - 3 years)</option>
                        <option>Senior (3 years or more)</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="petGender" style="margin-bottom:8px;">Pet Gender</label>
                    <select class="form-control" id="petGender" required>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="vaccinated" style="margin-bottom:8px;">Pet Vaccination</label>
                    <select class="form-control" id="vaccinated" required>
                        <option>Yes, Pet is Vaccinated</option>
                        <option>No, Pet is not Vaccinated</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">
                <!-- Health Details -->
                
                <div class="form-group mt-3">
                    <label for="neutered" style="margin-bottom:8px;">Pet Neutered</label>
                    <select class="form-control" id="neutered" required>
                        <option>Yes, Pet is Neutered</option>
                        <option>No, Pet is not Neutered</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="sprayed" style="margin-bottom:8px;">Pet Sprayed</label>
                    <select class="form-control" id="sprayed" required>
                        <option>Yes, Pet is Sprayed</option>
                        <option>No, Pet is not Sprayed</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="shots" style="margin-bottom:8px;">Pet shots upto date</label>
                    <select class="form-control" id="shots" required>
                        <option>Yes, Shots upto date</option>
                        <option>No, Shots not upto date</option>
                    </select>
                </div>
                <!-- Behavior Details -->
                <div class="form-group mt-3">
                    <label for="goodWithDogs" style="margin-bottom:8px;">Pet is good with dogs?</label>
                    <select class="form-control" id="goodWithDogs" required>
                        <option>Yes, Good with dogs</option>
                        <option>No, Not Good with dogs</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="goodWithCats" style="margin-bottom:8px;">Pet is good with cats?</label>
                    <select class="form-control" id="goodWithCats" required>
                        <option>Yes, Good with cats</option>
                        <option>No, Not Good with cats</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="goodWithKids" style="margin-bottom:8px;">Pet is good with kids?</label>
                    <select class="form-control" id="goodWithKids" required>
                        <option>Yes, Good with kids</option>
                        <option>No, Not Good with kids</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Reason for Rehoming -->
        <div class="form-group mt-3">
            <label for="reason" style="margin-bottom:8px;">Why do you want to rehome the Pet?</label>
            <textarea class="form-control" id="reason" rows="3" placeholder="Enter reason here"></textarea>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark mt-3  ">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: white;">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
    

  </body>
</html>