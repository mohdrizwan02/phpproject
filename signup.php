<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .setheight{
            min-height:604px;
        }
        body {
            background-image: url('essentials/signupbackground.jpg'); /* Path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.0); /* Transparent background */
            padding: 20px;
            border-radius: 10px;
        }

        .form-control {
            background: transparent !important; /* Make form controls transparent */
            border: 1px solid white !important; /* Thin border */
            border-radius: 5px; /* Remove border-radius to make the border consistent */
            color: #fff; /* Text color */
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3) !important; /* Change background color on focus */
            border-color: #007bff !important; /* Change border color on focus */
        }

        .btn-primary {
            background-color: #007bff !important; /* Set primary button background color */
            border-color: #007bff !important; /* Set primary button border color */
        }

        .btn-primary:hover {
            background-color: #0056b3 !important; /* Set primary button hover background color */
            border-color: #0056b3 !important; /* Set primary button hover border color */
        }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="setheight">
    <?php require 'essentials/_navbar.php';
    include 'essentials/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email']; 
        $phone=$_POST['phone'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $state=$_POST['state'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $pincode=$_POST['pincode'];
        $city=$_POST['city'];
        $cpassword=$_POST['cpassword']; 
        
        $sqlexists="SELECT * FROM `details` WHERE username='$username'";
        $existresult=mysqli_query($conn,$sqlexists);
        $existrows=mysqli_num_rows($existresult);
        if($existrows>0)
        {
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error</strong> Username already exists,Please use other username
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{ 
            if($cpassword==$password)
            {
                if(validatePassword($password)){
                    if(isAlphabetic($firstname)){
                        if(isValidPhoneNumber($phone)){
                            if(isValidPIN($pincode)){
                                if(isValidDOB($dob)){
                                    $hashpassword=password_hash($password,PASSWORD_BCRYPT);
                                    $sql1="INSERT INTO `details` ( `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONE`, `PASSWORD`, `USERNAME`, `PINCODE`, `STATE`,`CITY`,`GENDER`, `DOB`) VALUES ( '$firstname', '$lastname', '$email', '$phone', '$hashpassword', '$username', '$pincode', '$state','$city', '$gender', '$dob');";
                                    $result1=mysqli_query($conn,$sql1);
                                    if($result1){
                                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>success </strong> your account has been successfully created please login
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
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
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>error ! </strong> password dont meet the criteria please make sure your password has Capital letter ,a number and a special character  
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
            else{
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error !</strong>passwords does not match please check the password and confirm password 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
    }
}
        
    

    
    // INSERT INTO `details` ( `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONE`, `PASSWORD`, `USERNAME`, `PINCODE`, `STATE`,`CITY`,`GENDER`, `DOB`) VALUES ( 'Mohammad', 'Rizwan', 'mohammadrizwan9515@gmail.com', '9515269727', '@9515269727Rizwan', 'mohd__rizwan02', '502307', 'telangana', 'male', '2004-09-13');?>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="form-container col-md-6">
        <h2 class="text-center  text-white mb-4">SIGNUP</h2>
        <form action="signup.php" method="POST">
            <div class="row mt-2">
            <div class="col-md-4">
                <label for="firstname" class="form-label text-white">First name</label>
                <input type="text" class="form-control" id="firstname" name=firstname required>
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label text-white">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname"  >
            </div>
            <div class="col-md-4">
                <label for="username" class="form-label text-white">Username</label>
                <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div> 
            </div>
            <div class="row mt-2">
                <div class="col md-6">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  required>
                </div>
                <div class="col md-6">
                    <label for="phone" class="form-label text-white">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone"  required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col md-6">
                    <label for="password" class="form-label text-white">password</label>
                    <input type="password" class="form-control" id="password" name="password"  required>
                </div>
                <div class="col md-6">
                    <label for="cpassword" class="form-label text-white">Confirm password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword"  required>
                </div>
            </div>
            <div class="row mt-2">
            <div class="col-md-6">
            <label for="state" class="form-label text-white">State</label>
                <select class="form-select" id="state" name="state" required>
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
            <label for="city" class="form-label text-white">City/Town</label>
                <input type="text" class="form-control" id="city" name="city" >
            </div>
            
           
            <div class="col-md-3">
                <label for="pincode" class="form-label text-white">Pincode</label>
                <input type="text" class="form-control" id="pincode" name="pincode" >
            </div>
            </div>
            <div class="row mt-2">
                <div class="col md-6">
                <label for="gender" style="color:white">Gender</label>
                <select class="form-control" name="gender" id="gender">
                  <option>Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
                </div>
                <div class="col md-6">
                    <label for="dob" class="form-label text-white">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob"  >
                </div>
            </div>
            
            <div class="col-12 text-center mt-4">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
            </form>
    </div>
</div>
<?php
function validatePassword($password) {
    // Define regular expressions for each criterion
    $hasNumber = preg_match('/[0-9]/', $password);
    $hasCapitalLetter = preg_match('/[A-Z]/', $password);
    $hasSpecialCharacter = preg_match('/[^A-Za-z0-9]/', $password); // Matches any character that is not a letter or a number

    // Check if all criteria are met
    if ($hasNumber && $hasCapitalLetter && $hasSpecialCharacter && strlen($password) >= 8) {
        return true; // Password meets all criteria
    } else {
        return false; // Password does not meet all criteria
    }
}?>

    


      
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </div>
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white" style="width: 100%; padding: 20px 0;height:70px;">
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
  </body>
</html>