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
        /* Custom Styles */
        .center-container {
            position: absolute;

           
            width: 100%;
            max-width: 1000px;
        }
        .custom-container {
            background-color: white;
            margin-top: 30px;   
            width: 100%;
            
            padding-top: 20px;
            border: 2px solid black;
            border-radius: 20px;
            padding-left: 15px;
            padding-right: 15px;
            margin-left:auto;
            margin-right: auto;
            margin-bottom:20px;;
        }
        @media (min-width: 576px) {
            .custom-container {
                margin-left: 15px;
                margin-right: 15px;
            }
        }
        *{
            padding:0px;
            margin:0px;
        }
        #profile{
            background-color:rgba(128, 128, 128, 0.2);
            width:450px;
            padding:15px;
            padding-bottom:30px;
            text:black;
            border-radius:20px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            background-color: rgba(128, 128, 128, 0.2);
            padding: 10px;
            border-radius: 15px;
        }
        .profile-title {
            margin-left: 30px;
        }
        .edit-profile-btn {
            margin-left: auto;
            border-radius: 10px;
        }
        @media (min-width: 576px) {
            .profile-header {
                margin-bottom: 20px;
            }
            .profile-title {
                margin-left: auto;
                margin-right: auto;
            }
            .edit-profile-btn {
                margin-left: auto;
                margin-right: 0;
            }
        }
        .custom-hr {
        margin-top: 20px;
    }
    .profile-info, .additional-info {
        margin-left: 45px;
        background-color: rgba(128, 128, 128, 0.2);
        padding: 20px;
        border-radius: 20px;
    }
    .additional-info {
        margin-bottom: 15px;
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
  <body>
    
  <?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("location:login.php");
      } 
    include 'essentials/_dbconnect.php';
    require 'essentials/_navbar.php';
    
    
   
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
   
   <div class="container custom-container" >
        <div class="profile-header">
            <h2 class="profile-title"><b>My Profile</b></h2>
            <button class="btn btn-dark edit-profile-btn" onclick="redirectToEditProfile()" style="border-radius: 10px;">Edit Profile</button>
        </div>



        <?php 
    echo '<div class="row mb-3">
            <div class="col-md-4">
                <img src="essentials/profileimage.php?id='.$row['ID'].'" class="img-fluid rounded-circle" alt="Profile Picture" style="height:250px;width:250px;">
            </div>
            <div class="col-md-8">
                <div id="profile">      
                    <h4 class="mt-4">'.$row['FIRSTNAME'].' '.$row['LASTNAME'].'</h4>
                    <h4 class="mt-1">'.$row['EMAIL'].'</h4>
                    <h4 class="mt-0">'.$row['USERNAME'].'</h4>
                    <div class="mt-3">
                        <button class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#profileimagemodal">VIEW PROFILE PICTURE</button>
                        <button class="btn btn-dark" onclick="viewblogs()" style="margin-left:40px;">VIEW MY BLOGS</button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="custom-hr">
        <div class="profile-info">
            <h3><b>About Me</b></h3>
            <p>  </p> <!-- Consider removing if not needed -->
            <h5>Contact Information</h5>
            <ul class="list-unstyled">
                <li><i class="fas fa-phone"></i> PHONE : '.$row['PHONE'].'</li>
                <li><i class="fas fa-envelope"></i> EMAIL : '.$row['EMAIL'].'</li>
                <li><i class="fas fa-map-marker-alt"></i> '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
            </ul>
        </div>
        <hr class="custom-hr">
        <div class="additional-info">
            <h5>Additional Information</h5>
            <ul class="list-unstyled">
                <li><i class="fas fa-birthday-cake"></i> Date of Birth: '.$row['DOB'].'</li>
                <li><i class="fas fa-venus-mars"></i> Gender: '.$row['GENDER'].'</li>
                <li><i class="fas fa-home"></i> '.$row['PINCODE'].' '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
            </ul>
        </div>';
?>

   
 </div>
 <div class="modal fade" id="profileimagemodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PROFILE IMAGE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="essentials/profileimage.php?id=<?php echo $row['ID']?>" width="700px" height="700px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

    </main>
  
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script>
    // Function to redirect to the edit profile page
    function redirectToEditProfile() {
        // Redirect to the edit profile page
        window.location.href = "editprofile.php"; // Replace "edit-profile.html" with the actual URL of your edit profile page
    }
</script>
<script>
        function viewblogs() {
            window.location.href="myblogs.php";
        }
    </script>
<footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white " style="width: 100%; padding: 20px 0;height:70px;margin-top:10px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
  </body>
  
</html>