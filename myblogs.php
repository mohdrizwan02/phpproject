<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MY BLOGS</title>
    <style>
      .setheight{
        min-height:604px;
      }
      .addbutton:hover {
            background-color: grey;
            border-color: grey;
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
    $username=$_SESSION['username'];
    ?>
    
    <div class="container setheight" style="margin-top:20px;">
      <div class="d-flex align-items-center justify-content-between">
        <h3 class="text-center mt-4 mb-3">MY BLOGS</h3>
        <a href="addblog.php"><button type="button" class="btn btn-dark addbutton ms-3 mt-4 mb-3" onclick="addblogs()">ADD MORE BLOGS</button></a>
      </div>
      <div class="accordion" id="accordionExample">
        <?php
        $blogquery="SELECT * FROM `blogs` WHERE BLOGUSERNAME='$username';";
        $blogresult=mysqli_query($conn,$blogquery);
        $blognum=mysqli_num_rows($blogresult);
        
        if($blognum>0){
            $counter = 1; // Counter for generating unique IDs
            while($blogrow=mysqli_fetch_array($blogresult)){
                $blogtitle=$blogrow['BLOGTITLE'];
                $blogdesc=$blogrow['BLOGDESC'];
                $blogid=$blogrow['BLOGID'];
                $collapseId = "collapse".$counter; // Generate unique collapse ID
                $headingId = "heading".$counter; // Generate unique heading ID
                echo '
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="'.$headingId.'">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#'.$collapseId.'" aria-expanded="true" aria-controls="'.$collapseId.'">
                            Blog ' .$counter.'
                        </button>
                    </h2>
                    <div id="'.$collapseId.'" class="accordion-collapse collapse show" aria-labelledby="'.$headingId.'" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <span><strong>BLOG TITLE : </strong>'. $blogtitle.'</span>
                            <a href="/phpproject/essentials/deleteblog.php?id='.$blogid.'">
                                <button type="button" class="btn btn-dark ms-3">Delete this blog</button>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>';
                $counter++; // Increment the counter for the next iteration
            }
        }
        ?>
                
        </div>
    </div>

      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
    <footer class="bg-body-tertiary text-center text-lg-start bg-dark text-white " style="width: 100%; padding: 20px 0;;margin-top:70px;">
  <!-- Copyright -->
  <div class="text-center p-1">
    © 2024 Copyright: HAPPY PETS
  </div>
  <!-- Copyright -->
</footer>
<script>
  function addblogs(){
    
  }
</script>
    
    
  </body>
</html>