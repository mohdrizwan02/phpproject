<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("location:login.php");
      }
     
    include 'essentials/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $user=$_SESSION['username'];
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $petBreed = $_POST['petBreed'] ;
        $petAge = $_POST['petAge'] ;
        $petGender = $_POST['petGender'] ;
        $vaccinated = $_POST['vaccinated'] ; 
        $neutered = $_POST['neutered'] ;
        $spayed = $_POST['spayed'] ;
        $shots = $_POST['shots'] ; 
        $goodWithDogs = $_POST['goodWithDogs'] ;
        $goodWithCats = $_POST['goodWithCats'] ;
        $goodWithKids = $_POST['goodWithKids'] ;
        $reason = $_POST['reason'];
        $ownerName = $_POST['ownerName'] ;
        $ownerPhone = $_POST['ownerPhone'];
        $ownerState = $_POST['ownerState'];
        $ownerCity = $_POST['ownerCity'];
        $ownerPincode = $_POST['ownerPincode'];
        $extra = $_POST['extra'];
        if(isset($_FILES["image1"]) && $_FILES["image1"]["error"] == 0){
        
            $file_handle = fopen($_FILES["image1"]["tmp_name"], "rb");
            if ($file_handle !== false) {
                
                $petimage1= fread($file_handle, filesize($_FILES["image1"]["tmp_name"]));
                fclose($file_handle);
            }
        }
            if(isset($_FILES["image2"]) && $_FILES["image2"]["error"] == 0){
        
                $file_handle = fopen($_FILES["image2"]["tmp_name"], "rb");
                if ($file_handle !== false) {
                    
                    $petimage2= fread($file_handle, filesize($_FILES["image2"]["tmp_name"]));
                    fclose($file_handle);
                }
            }
                if(isset($_FILES["image3"]) && $_FILES["image3"]["error"] == 0){
        
                    $file_handle = fopen($_FILES["image3"]["tmp_name"], "rb");
                    if ($file_handle !== false) {
                        
                        $petimage3= fread($file_handle, filesize($_FILES["image3"]["tmp_name"]));
                        fclose($file_handle);
                    }
                }
                    if(isset($_FILES["image4"]) && $_FILES["image4"]["error"] == 0){
        
                        $file_handle = fopen($_FILES["image4"]["tmp_name"], "rb");
                        if ($file_handle !== false) {
                            
                            $petimage4= fread($file_handle, filesize($_FILES["image4"]["tmp_name"]));
                            fclose($file_handle);
                        }
                    }
                        if(isset($_FILES["image5"]) && $_FILES["image5"]["error"] == 0){
        
                            $file_handle = fopen($_FILES["image5"]["tmp_name"], "rb");
                            if ($file_handle !== false) {
                                
                                $petimage5= fread($file_handle, filesize($_FILES["image5"]["tmp_name"]));
                                fclose($file_handle);
                            }
                        }
                            if(isset($_FILES["image6"]) && $_FILES["image6"]["error"] == 0){
        
                                $file_handle = fopen($_FILES["image6"]["tmp_name"], "rb");
                                if ($file_handle !== false) {
                                    
                                    $petimage6= fread($file_handle, filesize($_FILES["image6"]["tmp_name"]));
                                    fclose($file_handle);
                                }
                            }
                            
        $petquery="INSERT INTO `pets` (`PETNAME`, `PETTYPE`, `PETBREED`, `PETAGE`, `PETGENDER`, `PETVACCINE`, `PETNEUTER`, `PETSPRAY`, `PETSHOTS`, `GOODDOGS`, `GOODCATS`, `GOODKIDS`, `PETREASON`, `NAME`, `PHONE`, `STATE`, `CITY`, `PINCODE`, `PETEXTRA`, `USERNAME`) VALUES ('$petName', '$petType', '$petBreed', '$petAge', '$petGender', '$vaccinated', '$neutered', '$spayed', '$shots', '$goodWithDogs', '$goodWithCats', '$goodWithKids', '$reason', '$ownerName', '$ownerPhone', '$ownerState', '$ownerCity', '$ownerPincode', '$extra', '$user');";
        
        $petresult=mysqli_query($conn,$petquery);
        
        if($petresult){
            $PetId = mysqli_insert_id($conn);
            
            $_SESSION['petdetailsadded']=true;
        }

        $petstmt=$conn->prepare("UPDATE `pets` SET `IMG1` = ?,`IMG2`= ?,`IMG3`= ?,`IMG4`= ?,`IMG5`= ?,`IMG6`= ? WHERE PETID= ?;");
        $petstmt->bind_param("ssssssi",$petimage1,$petimage2,$petimage3,$petimage4,$petimage5,$petimage6,$PetId);
        if($petstmt->execute()){
          
        }
    
if($_SESSION['petdetailsadded']=true){
    header("location:home.php");   
}           
} 
 
    
    ?>
    <?php 
    require 'essentials/_navbar.php';
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rehome a Pet</title>
    <style>
     

    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Rehome a Pet</h1>
    <form action="rehome-a-pet.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 mt-3">
            <!-- Pet Details -->
            <div class="form-group">
                <label for="petName">Pet's Name</label>
                <input type="text" class="form-control" id="petName" name="petName" placeholder="Enter pet's name" required>
            </div>
            <div class="form-group mt-3">
                <label for="petType">Pet Type</label>
                <select class="form-control" id="petType" name="petType" required>
                    <option>Dogs</option>
                    <option>Cats</option>
                    <option>Birds</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="petBreed">Pet Breed</label>
                <input type="text" class="form-control" id="petBreed" name="petBreed" placeholder="Enter pet's breed" required>
            </div>
            <div class="form-group mt-3">
                <label for="petAge">Age of your Pet</label>
                <select class="form-control" id="petAge" name="petAge" required>
                    <option>Puppyhood (Up to 6 Months)</option>
                    <option>Adolescence (6 - 18 Months)</option>
                    <option>Adulthood (1.5 - 3 years)</option>
                    <option>Senior (3 years or more)</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="petGender">Pet Gender</label>
                <select class="form-control" id="petGender" name="petGender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="vaccinated">Pet Vaccination</label>
                <select class="form-control" id="vaccinated" name="vaccinated" required>
                    <option>Yes, Pet is Vaccinated</option>
                    <option>No, Pet is not Vaccinated</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Health Details -->
            <div class="form-group mt-3">
                <label for="neutered">Pet Neutered</label>
                <select class="form-control" id="neutered" name="neutered" required>
                    <option>Yes, Pet is Neutered</option>
                    <option>No, Pet is not Neutered</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="spayed">Pet Spayed</label>
                <select class="form-control" id="spayed" name="spayed" required>
                    <option>Yes, Pet is Spayed</option>
                    <option>No, Pet is not Spayed</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="shots">Pet shots up to date</label>
                <select class="form-control" id="shots" name="shots" required>
                    <option>Yes, Shots up to date</option>
                    <option>No, Shots not up to date</option>
                </select>
            </div>
            <!-- Behavior Details -->
            <div class="form-group mt-3">
                <label for="goodWithDogs">Pet is good with dogs?</label>
                <select class="form-control" id="goodWithDogs" name="goodWithDogs" required>
                    <option>Yes, Good with dogs</option>
                    <option>No, Not Good with dogs</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="goodWithCats">Pet is good with cats?</label>
                <select class="form-control" id="goodWithCats" name="goodWithCats" required>
                    <option>Yes, Good with cats</option>
                    <option>No, Not Good with cats</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="goodWithKids">Pet is good with kids?</label>
                <select class="form-control" id="goodWithKids" name="goodWithKids" required>
                    <option>Yes, Good with kids</option>
                    <option>No, Not Good with kids</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Reason for Rehoming -->
    <div class="form-group mt-3">
        <label for="reason">Why do you want to rehome the Pet?</label>
        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason here"></textarea>
    </div>

    <!-- Owner Details -->
    <div class="row mt-4">
        <h2>Owner Details</h2>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="ownerName">Owner's Name</label>
                <input type="text" class="form-control mb-2" id="ownerName" name="ownerName" placeholder="Enter Owner's name" required>
            </div>
        </div>             
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="ownerPhone">Phone Number</label>
                <input type="text" class="form-control mb-2" id="ownerPhone" name="ownerPhone" placeholder="Enter Phone " required>
            </div>
        </div>             
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="ownerState">Owner's State</label>
                <input type="text" class="form-control mb-2" id="ownerState" name="ownerState" placeholder="Enter State" required>
            </div>
        </div>             
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="ownerCity">Owner's City</label>
                <input type="text" class="form-control mb-2" id="ownerCity" name="ownerCity" placeholder="Enter City" required>
            </div>
        </div>             
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="ownerPincode">Owner's Pincode</label>
                <input type="text" class="form-control mb-2" id="ownerPincode" name="ownerPincode" placeholder="Enter Pincode" required>
            </div>
        </div>             
    </div>
    
    <!-- Extra Information -->
    <div class="form-group">
        <label for="extra">Extra Information about the pet</label>
        <textarea class="form-control" id="extra" name="extra" rows="3" placeholder="Info About pet"></textarea>
    </div>

    <!-- Image Uploads -->
    <div class="row mt-4">
        <h2>Upload Images of the Pet <i><h3>(MAX SIZE 500kb)</h3></i></h2>
    </div>
    <div class="row mt-4">
        <div class="col-4">
            <div class="mb-3">
                <label for="image1" class="form-label">IMAGE 1</label>
                <input class="form-control mb-3" type="file" id="image1" name="image1">
                <div id="pimg1" class="d-none">
                    <img id="imgp1" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="image2" class="form-label">IMAGE 2</label>
                <input class="form-control mb-3" type="file" id="image2" name="image2">
                <div id="pimg2" class="d-none">
                    <img id="imgp2" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="image3" class="form-label">IMAGE 3</label>
                <input class="form-control mb-3" type="file" id="image3" name="image3">
                <div id="pimg3" class="d-none">
                    <img id="imgp3" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="image4" class="form-label">IMAGE 4</label>
                <input class="form-control mb-3" type="file" id="image4" name="image4">
                <div id="pimg4" class="d-none">
                    <img id="imgp4" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="image5" class="form-label">IMAGE 5</label>
                <input class="form-control mb-3" type="file" id="image5" name="image5">
                <div id="pimg5" class="d-none">
                    <img id="imgp5" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="image6" class="form-label">IMAGE 6</label>
                <input class="form-control mb-3" type="file" id="image6" name="image6">
                <div id="pimg6" class="d-none">
                    <img id="imgp6" src="#" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
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
   
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white" style="width: 100%; padding: 20px 0;height:70px;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
    
<script>
    // Show image preview when selecting a file
    document.getElementById("image1").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp1").src = e.target.result;
            document.getElementById("pimg1").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
<script>
    // Show image preview when selecting a file
    document.getElementById("image2").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp2").src = e.target.result;
            document.getElementById("pimg2").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
<script>
    // Show image preview when selecting a file
    document.getElementById("image3").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp3").src = e.target.result;
            document.getElementById("pimg3").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
<script>
    // Show image preview when selecting a file
    document.getElementById("image4").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp4").src = e.target.result;
            document.getElementById("pimg4").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
<script>
    // Show image preview when selecting a file
    document.getElementById("image5").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp5").src = e.target.result;
            document.getElementById("pimg5").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
<script>
    // Show image preview when selecting a file
    document.getElementById("image6").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imgp6").src = e.target.result;
            document.getElementById("pimg6").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
  </body>
</html>