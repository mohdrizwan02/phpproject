<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body><header>
<?php
    session_start();
     
    
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
    require 'essentials/_navbar.php';
     
    include 'essentials/_dbconnect.php';
    $_SESSION['edited']=false;
    if(isset($_SESSION['imageupdated'])==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong> profile picture has been successfully updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['imageupdated']);
    }
    ?>
    </header>
    <?php
    $username=$_SESSION['username'];
    $sqle="SELECT * FROM `details` WHERE USERNAME ='$username'";
    $result=mysqli_query($conn, $sqle);
    $row=mysqli_fetch_array($result);
    $id=$row['ID'];
    $oldfirstname=$row["FIRSTNAME"];
    $oldlastname=$row["LASTNAME"];
    $oldemail=$row["EMAIL"];
    $oldphone=$row["PHONE"];
    $oldstate=$row["STATE"];
    $oldgender=$row["GENDER"];
    $olddob=$row["DOB"];
    $oldpincode=$row["PINCODE"];
    $oldcity=$row["CITY"];
    $oldaddress=$row["ADDRESS"];
    if(($_SERVER['REQUEST_METHOD']=='POST')){
        $firstname=$_POST['firstname'];
         $lastname=$_POST['lastname'];
         $email=$_POST['email']; 
         $phone=$_POST['phone'];
         $state=$_POST['state'];
         $gender=$_POST['gender'];
         $dob=$_POST['dob'];
         $pincode=$_POST['pincode'];
         $city=$_POST['city'];
         $address=$_POST['address'];
         $sqlu="UPDATE `details` SET `FIRSTNAME` = '$firstname', `LASTNAME` = '$lastname', `EMAIL` = '$email', `PHONE` = '$phone',  `PINCODE` = '$pincode', `STATE` = '$state', `CITY` = '$city', `ADDRESS` = '$address', `GENDER` = '$gender', `DOB` = '$dob' WHERE `ID` = $id;";
         if(isAlphabetic($firstname)){
            if(isValidPhoneNumber($phone)){
                if(isValidPIN($pincode)){
                    if(isValidDOB($dob)){
                            $resultu=mysqli_query($conn, $sqlu);
                            if($resultu){
                            //     echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            //     <strong>Success!</strong> your profile has been successfully submitted
                            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            // </div>';
                            $_SESSION['edited']=true;
                            header('location:profilepage.php');
                             exit();
                            }
                            else{
                                echo mysqli_error($conn);
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>warning!</strong> your profile have not been successfully updated
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            }
                        
                        }else{
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>invalid date of birth!</strong> please check your date of birth
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    }else{
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>invalid pin code!</strong> check your pincode
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>invalid phone number!</strong> check your phone number
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            else {echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>invalid name!</strong> please only use alphabets in your name
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } 
    }     
   ?>      
         
    
 <main>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Edit Profile Photo</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-12 text-center">
                        <img src="essentials/profileimage.php?id=<?php echo $row['ID']?>" class="img-fluid rounded" style="width: 200px; height: 200px;" alt="Profile Picture">
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#profileimagemodal">View Profile Photo</button>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileImageModal">Edit Profile Photo</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <button class="btn btn-secondary " onclick="gotoprofile()">go to profile</button>
                        </div>                 
                    </div>
                    <!-- You can add input for uploading photo or use other methods to edit profile photo -->
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="editprofile.php" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="firstname" class="form-label text-black">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $oldfirstname;?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="lastname" class="form-label text-black">Last name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $oldlastname;?>">
                            </div>
                            <div class="col-md-4">
                                <label for="username" class="form-label text-black">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username?>" aria-describedby="inputGroupPrepend2" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="email" class="form-label text-black">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $oldemail;?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-black">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $oldphone;?>" required>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="state" class="form-label text-black">State</label>
                                <select class="form-select" id="state" name="state" value="<?php echo $oldstate;?>" required>
                                    <option>Select State</option>
                                    <option>Andaman and Nicobar Islands</option>
                                    <option>Andhra Pradesh</option>
                                    <option>Arunachal Pradesh</option>
                                    <option>Assam</option>
                                    <option>Bihar</option>
                                    <option>Chandigarh</option>
                                    <option>Chhattisgarh</option>
                                    <option>Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option>Delhi</option>
                                    <option>Goa</option>
                                    <option>Gujarat</option>
                                    <option>Haryana</option>
                                    <option>Himachal Pradesh</option>
                                    <option>Jammu and Kashmir</option>
                                    <option>Jharkhand</option>
                                    <option>Karnataka</option>
                                    <option>Kerala</option>
                                    <option>Ladakh</option>
                                    <option>Lakshadweep</option>
                                    <option>Madhya Pradesh</option>
                                    <option>Maharashtra</option>
                                    <option>Manipur</option>
                                    <option>Meghalaya</option>
                                    <option>Mizoram</option>
                                    <option>Nagaland</option>
                                    <option>Odisha</option>
                                    <option>Puducherry</option>
                                    <option>Punjab</option>
                                    <option>Rajasthan</option>
                                    <option>Sikkim</option>
                                    <option>Tamil Nadu</option>
                                    <option>Telangana</option>
                                    <option>Tripura</option>
                                    <option>Uttar Pradesh</option>
                                    <option>Uttarakhand</option>
                                    <option>West Bengal</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="city" class="form-label text-black">City/Town</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo $oldcity;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="pincode" class="form-label text-black">Pincode</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $oldpincode;?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="address" class="form-label text-black">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $oldaddress;?>" >
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="gender" class="form-label text-black">Gender</label>
                                <select class="form-select" id="gender" name="gender" value="<?php echo $oldgender;?>" required>
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label text-black">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $olddob;?>">
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
<!-- Extra large modal -->


<!-- Large modal -->
<!-- Button trigger modal -->


<!-- Modal -->
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
<div class="modal fade" id="editProfileImageModal" tabindex="-1" aria-labelledby="editProfileImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileImageModalLabel">Edit Profile Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="essentials/editprofileimage.php">
          <div class="mb-3">
            <label for="profileImage" class="form-label">Choose Image:</label>
            <input type="file" class="form-control" id="profileImage" name="profile_picture" accept="image/*" required>
            <h5 style="margin-top:10px;">maxsize 500KB</h5>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white " style="width: 100%; padding: 20px 0;height:70px;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
<?php
function isAlphabetic($str) {
    // Using a regular expression to match only alphabetic characters
    return preg_match("/^[a-zA-Z]+$/", $str);
}
function isValidPhoneNumber($phone) {
    // Define the regular expression pattern for a valid phone number
    $pattern = "/^\d{10}$/"; // Matches a 10-digit number
    
    // Check if the phone number matches the pattern
    if (preg_match($pattern, $phone)) {
        // Phone number is valid
        return true;
    } else {
        // Phone number is invalid
        return false;
    }
}
function isValidPIN($pincode) {
    // Remove all non-digit characters from the PIN code
    $pincode = preg_replace('/\D/', '', $pincode);

    // Check if the PIN code has the correct length (adjust for specific country requirements)
    if (strlen($pincode) == 6) {
        // Further validation can be added here based on specific requirements
        return true;
    } else {
        return false;
    }
}
function isValidDOB($dob) {
    // Create a DateTime object from the input date of birth
    $dateOfBirth = DateTime::createFromFormat('Y-m-d', $dob);
    
    // Get the current date
    $currentDate = new DateTime();
    
    // Calculate the age
    $age = $currentDate->diff($dateOfBirth)->y;
    
    // Check if the age is above 15 and the date of birth is valid
    if ($age >= 15 && $dateOfBirth && $dateOfBirth->format('Y-m-d') === $dob) {
        return true;
    } else {
        return false;
    }
}
?>
<script>
    function gotoprofile(){
        window.location.href = "profilepage.php";
    }
</script>

</body>
</html>
