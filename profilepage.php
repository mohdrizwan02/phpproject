<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        *{
            padding:0px;
            margin:0px;
        }
        #profile{
            background-color:rgba(128, 128, 128, 0.2);
            width:450px;
            padding:15px;
            padding-bottom:30px;
            
            background
            text:black;
            border-radius:20px;
        }
    </style>
    <style>
  /* Change background color on hover */
  .btn-dark:hover {
    background-color:rgb(13, 110, 253);
    color:white;
  }
</style>
  </head>
  <body><header>
  <?php
    session_start(); 
    include 'essentials/_dbconnect.php';
    require 'essentials/_navbar.php';
    
    
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
    if(isset($_SESSION['edited'])){
    if($_SESSION["edited"]) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> your profile has been successfully updated
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    $_SESSION['edited']=false;
    }
}
    
    $username=$_SESSION['username'];
    $sqle="SELECT * FROM `details` WHERE USERNAME ='$username'";
    $result=mysqli_query($conn, $sqle);
    $row=mysqli_fetch_array($result);
    $oldfirstname=$row["FIRSTNAME"];
    

   ?>
   <div class="container" style="background-color:white;margin-top:30px;margin-left:250px;margin-bottom:30px;width:1000px;padding-top:20px;border:black solid 2px;border-radius:20px;">
   <div style="display: flex; align-items: center;margin-bottom:30px; background-color:rgba(128, 128, 128, 0.2);padding:10px;border-radius:15px;   ">
    <h2 style=" margin-left: 30px;"><b>My Profile</b></h2>
    <button class="btn btn-dark"onclick="redirectToEditProfile()" style="margin-left:600px;border-radius:10px;">Edit Profile</button>
</div>



       <?php 
          echo '<div class="row mb-3">
            <div class="col-md-4">
                <img src="essentials/profileimage.php?id='.$row['ID'].'" class="img-fluid rounded-circle" alt="Profile Picture" style="height:250px;width:250px;radius:50%;margin-left:30px;">
            </div >
                <div class="col-md-8">
                      <div id="profile" >      
                    <h4 class="mt-4">'.$row['FIRSTNAME'].' '.$row['LASTNAME'].'</h4>
                        <h4 class=" mt-1">'.$row['EMAIL'].'</h4>
                    <h4 class="mt-0">'.$row['USERNAME'].'</h4>
                    <div style="display: inline-block;margin-top:25px;">
                    <button class="btn btn-dark" onclick="" style="margin-left:20px;">VIEW PROFILE PICTURE</button>
                    </div>
                    <div style="display: inline-block;">
                        <button class="btn btn-dark" onclick="" style="margin-left:40px;">VIEW MY BLOGS</button>
                    </div>
                    </div>

        </div>
        <hr style="margin-top:20px;">
        <div style="margin-left:45px;background-color:rgba(128, 128, 128, 0.2);width:900px;padding:20px;border-radius:20px;">
        <h3><b>About Me</b></h3>
                    <p>  </p>
                    <h5>Contact Information</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone"></i>PHONE : '.$row['PHONE'].'</li>
                        <li><i class="fas fa-envelope"></i>EMAIL : '.$row['EMAIL'].'</li>
                        <li><i class="fas fa-map-marker-alt"></i> '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
                    </ul></div><hr style="margin-top:20px;">
                    <div style="margin-left:45px;margin-bottom:15px;background-color:rgba(128, 128, 128, 0.2);width:900px;padding:20px;border-radius:20px;">
                    <h5>Additional Information</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-birthday-cake"></i> Date of Birth: '.$row['DOB'].'</li>
                        <li><i class="fas fa-venus-mars"></i> Gender: '.$row['GENDER'].'</li>
                        <li><i class="fas fa-home"></i> '.$row['PINCODE'].' '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
                        
                    </ul>
                    </div>
   </div>';

   ?>
   
 </div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
    // Function to redirect to the edit profile page
    function redirectToEditProfile() {
        // Redirect to the edit profile page
        window.location.href = "editprofile.php"; // Replace "edit-profile.html" with the actual URL of your edit profile page
    }
</script>
<footer class="bg-body-tertiary text-center text-lg-start bg-dark ">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: white;">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
  </body>
</html>