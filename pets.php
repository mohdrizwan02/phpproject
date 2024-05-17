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
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
     require 'essentials/_navbar.php';
     
    include 'essentials/_dbconnect.php';
    
    
    ?>
    <?php 
    if(isset($_GET['pettype'])) {
      $pet=$_GET['pettype'];
      $_SESSION['pet']=$_GET['pettype'];
      
    } 
    else{
    $_SESSION['pet']=$_GET['pet'];
    $pet=$_SESSION['pet'];
    } 
     if(!(strpos($pet,"dogs")!==false||strpos($pet,"cats")!==false||strpos($pet,"birds")!==false)){
       $_SESSION['peterror']=$pet;
       header("location:home.php");
     }
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $pincode=$_POST['pincode'];
       $sqlp="SELECT * FROM `pets` WHERE PETTYPE='$pet' AND PINCODE='$pincode';";
       $resultp=mysqli_query($conn,$sqlp);
       $nums=mysqli_num_rows( $resultp);
       
      if($nums>0){
        while($prow=mysqli_fetch_array( $resultp )){
          $petid=$prow["PETID"];
          $petname=$prow["PETNAME"];
          $petgender=$prow["PETGENDER"];
          $petage=$prow["PETAGE"];
          $city=$prow["CITY"];
          $state=$prow["STATE"];
          $name=$prow["NAME"];
          $phone=$prow["PHONE"];
       echo ' <div class="container">
        <h3 style="margin-top:10px;">'.$_SESSION['pet'].' IN YOUR LOCATION ['.$pincode.']</h3>
        <div class="row" id="adopt">
          <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
            <div class="card w-100 my-2 shadow-2-strong">
              <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
              <div class="card-body d-flex flex-column">
              <h5 class="card-title">'.$petname.'</h5>
              <p class="card-text">'.$petgender.','.$petage.'</p>
              <p class="card-text">'.$city.','.$state.'</p>
              <hr>
              <h6 class="card-text">Owner details</h6>
              <p class="card-text">Name:'.$name.'<br>Contact:'.$phone.'</p>
              <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                <a href="petdetails.php?petid='.$petid.'" class="btn btn-primary shadow-0 me-1">View all details</a>
                </div>
              </div>
            </div>
          </div>';
        }
        echo '</div>
      </div>';
    }
    else{
        echo ' <div class="container"><h3 style="margin-top:20px;">SORRY! No adoptable pets available at you pincode'
        .' Please provide other flexible pincode</h3> 
        <button type="button" class="btn btn-dark shadow-0 text-light mt-3 pt-2 border border-white"  onclick=openModal1() id="pincodemodal">
          <span class="pt-1">look for other pincode</span>
        </button>
        <a href="pets.php?pet='.$_SESSION ['pet'].' "><button type="button" class="btn btn-dark shadow-0 text-light mt-3 pt-2 border border-white"   >
          <span class="pt-1">go back</span>
        </button></a>
      </div>  
      <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">look for other pincode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form or content here -->
        <form action="pets.php?pet='.$_SESSION ['pet'].'" method="post">
            <label for="Pincode">Enter Pincode</label>
            <input type="text" id="pincode" name="pincode"><br><br>
            
            <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>';
    }
  }
    
    
    

    else { echo '
    <div class="bg-primary text-white py-5">
    <div class="container py-5">
      <h1>
        Looking for '. $_SESSION['pet'] .', <br />
        explore adoptable '. $_SESSION['pet'] .' on happy pets nearby your area
      </h1>
      <p>
        "From Furry Friends to Forever Companions, Discover Unparalleled Love, and Unforgettable Memories with Happy Pets."
      </p>
        <a href="about.php" >
          <button type="button" class="btn btn-outline-light">
            Learn more
          </button>
        </a>
        
          <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white"  onclick=openModal() id="pincodemodal">
            <span class="pt-1">adopt now</span>
          </button>
        
    </div>
  </div>
  
</header>

<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3> '.$_SESSION['pet'].' nearby</h3>
    </header>

    <div class="row" id="adopt">';
    $sqlpet="SELECT * FROM `pets` WHERE PETTYPE='$pet';";
    $resultpet=mysqli_query($conn,$sqlpet);
    
    while($petrow=mysqli_fetch_array( $resultpet )){
      $petid=$petrow["PETID"];
      $petname=$petrow["PETNAME"];
      $petgender=$petrow["PETGENDER"];
      $petage=$petrow["PETAGE"];
      $city=$petrow["CITY"];
      $state=$petrow["STATE"];
      $name=$petrow["NAME"];
      $phone=$petrow["PHONE"];
      echo '<div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">'.$petname.'</h5>
            <p class="card-text">'.$petgender.','.$petage.'</p>
            <p class="card-text">'.$city.','.$state.'</p>
            <hr>
            <h6 class="card-text">Owner details</h6>
            <p class="card-text">Name:'.$name.'<br>Contact:'.$phone.'</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="petdetails.php?petid='.$petid.'" class="btn btn-primary shadow-0 me-1">View all details</a>
              
            </div>
          </div>
        </div>
      </div>';
    }
      
  echo '</div>
  </div>
    

<!-- modal for pincode -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">search by pincode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form or content here -->
        <form action="pets.php?pet='.$_SESSION ['pet'].'" method="post">
            <label for="Pincode">Enter Pincode</label>
            <input type="text" id="pincode" name="pincode"><br><br>
            
            <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>';
}


?>
 <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white fixed-bottom" style="width: 100%; padding: 20px 0;height:70px;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>

<script>
function openModal() {
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    myModal.show();
}
</script>
<script>
function openModal1() {
    var myModal1 = new bootstrap.Modal(document.getElementById('myModal1'));
    myModal1.show();
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
