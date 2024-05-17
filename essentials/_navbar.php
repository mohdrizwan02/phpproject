<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<?php 

$loggedin=false;
if(isset($_SESSION["login"])){
   $loggedin=true;
}

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/phpproject/home.php"><img src="essentials/happypets.png"  alt="Happy Pet Store Logo" style="max-width: 120px; height: auto;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/phpproject/home.php">Home</a>
        </li>';
         if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/phpproject/login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/phpproject/signup.php">signup</a>
        </li>';}
        if($loggedin){
          echo'<li class="nav-item">
          <a class="nav-link" href="/phpproject/home.php#about">about</a>
        </li>';
          
        echo '<li class="nav-item">
          <a class="nav-link" href="/phpproject/logout.php">logout</a>
        </li>';}
        ?>
        
       <?php 
       if(isset($_SESSION['login'])){
       echo '</ul>
      <form class="d-flex " action="/phpproject/pets.php" method="GET">
        <input class="form-control me-2" type="search" id="pettype" name="pettype" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>';
       }
      ?>
      <?php
      if($loggedin){
       echo '<div class="d-flex align-items-center">
       
       <a href="notifications.php" class="btn btn-transparent mx-1 glow-on-hover"><i class="bi text-white bi-bell"></i></a>
       <a href="profilepage.php" class="btn btn-transparent mx-1 glow-on-hover"><i class="bi bi-person-circle text-white"></i></i></a>
     </div>  ';
      }
    ?>
    </div>
  </div>
    
</nav>
<style>
    
    .navbar {
      min-height: 80px; 
      margin:0px;
      padding-top: 15px;
      padding-bottom: 15px;
      
    }

   
  </style>
<style>
  .glow-on-hover:hover {
    animation: glow 1s ease-in-out infinite alternate;
  }

  @keyframes glow {
    from {
      text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff00de, 0 0 70px #ff00de, 0 0 80px #ff00de, 0 0 100px #ff00de, 0 0 150px #ff00de;
    }

    to {
      text-shadow: 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 50px #ff00de, 0 0 80px #ff00de, 0 0 90px #ff00de, 0 0 110px #ff00de, 0 0 160px #ff00de;
    }
  }
</style>
