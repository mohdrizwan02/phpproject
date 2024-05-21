<?
 session_start();
 if(!isset($_SESSION['login'])) {
     header("location:login.php");
   }
$user=$_SESSION['username'];
  
 include 'essentials/_dbconnect.php';
 echo 'helo start';
if($_SERVER['REQUEST_METHOD']=='POST'){
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
                            echo 'hello';
        $petquery="INSERT INTO `pets` (`PETNAME`, `PETTYPE`, `PETBREED`, `PETAGE`, `PETGENDER`, `PETVACCINE`, `PETNEUTER`, `PETSPRAY`, `PETSHOTS`, `GOODDOGS`, `GOODCATS`, `GOODKIDS`, `PETREASON`, `NAME`, `PHONE`, `STATE`, `CITY`, `PINCODE`, `PETEXTRA`, `USERNAME`) VALUES ('$petName', '$petType', '$petBreed', '$petAge', '$petGender', '$vaccinated', '$neutered', '$spayed', '$shots', '$goodWithDogs', '$goodWithCats', '$goodWithKids', '$reason', '$ownerName', '$ownerPhone', '$ownerState', '$ownerCity, '$ownerPincode', '$extra', '$user');";
        echo 'hello1';
        $petresult=mysqli_query($conn,$petquery);
        echo 'hello2';
        if($petresult){
            echo 'result updated';
        }
        
           
} 
        
        
        
    
    ?>