<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
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
    

    
    echo '</header>
    <div class="container-fluid mx-0 mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">User Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Profile Picture">
                        </div>
                        <div class="col-md-9">
                            
                            <h4 class="mt-4">'.$row['FIRSTNAME'].' '.$row['LASTNAME'].'</h4>
                            <p class="text-muted mb-0">'.$row['EMAIL'].'</p>
                            <h4 class="mt-0">'.$row['USERNAME'].'</h4>
                        </div>
                    </div>
                    <hr>
                    <h5>About Me</h5>
                    <p>  </p>
                    <h5>Contact Information</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone"></i> '.$row['PHONE'].'</li>
                        <li><i class="fas fa-envelope"></i>'.$row['EMAIL'].'</li>
                        <li><i class="fas fa-map-marker-alt"></i> '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
                    </ul>
                    <h5>Additional Information</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-birthday-cake"></i> Date of Birth: '.$row['DOB'].'</li>
                        <li><i class="fas fa-venus-mars"></i> Gender: '.$row['GENDER'].'</li>
                        <li><i class="fas fa-home"></i> '.$row['ADDRESS'].' '.$row['CITY'].' '.$row['STATE'].'</li>
                        
                    </ul>
                    <button class="btn btn-primary" onclick="redirectToEditProfile()">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>';
?>

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