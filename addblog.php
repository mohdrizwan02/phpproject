<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <style>
    .container {
    border: 2px solid black; /* Border with 2px width and black color */
    border-radius: 10px; /* Rounded corners with 10px radius */
    padding:20px
}
.form-control{
    border:2px solid black;
}

  </style>
  <body>
  <?php
session_start();
require 'essentials/_navbar.php';
include 'essentials/_dbconnect.php';
$blogusername=$_SESSION['username'];

if(!isset($_SESSION['login'])) {
    header("location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogTitle = $_POST['blogTitle'];
    $blogDescription = $_POST['blogDescription'];
    $timestamp = date("Y-m-d H:i:s");
    $imagename=$_FILES['blogImage']['name'];
    $tempname=$_FILES['blogImage']['tmp_name'];
    $imagedata=file_get_contents($tempname);
    $folder='essentials/'.$imagename;
    $queryi="INSERT INTO `blogs` (`BLOGTITLE`, `BLOGIMAGE`, `BLOGDESC`, `BLOGUSERNAME`, `BLOGTIMESTAMP`) VALUES (?,?,?,?,?);";
    $resulti=$conn->prepare($queryi);
    $resulti->bind_param("sbsss",$blogTitle,$imagedata,$blogDescription,$blogusername,$timestamp);
    $resulti->execute();
    

//     $targetDir = "essentials/";
//     $targetFile = $targetDir . basename($_FILES["blogImage"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//     // Check if file is a PNG image
//     if($imageFileType != "png") {
//         echo "Sorry, only PNG files are allowed.";
//         $uploadOk = 0;
//     }

//     // Check file size
//     if ($_FILES["blogImage"]["size"] > 400000) { // 400 KB in bytes
//         echo "Sorry, your file is too large (maximum size is 400KB).";
//         $uploadOk = 0;
//     }

//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//     } else {
//         if (move_uploaded_file($_FILES["blogImage"]["tmp_name"], $targetFile)) {
//             echo "The file " . htmlspecialchars(basename($_FILES["blogImage"]["name"])) . " has been uploaded.";

//             // Insert data into the database
//             $sql = "INSERT INTO `blogs` (BLOGTITLE,BLOGIMAGE,BLOGDESC) VALUES ('$blogTitle', '$targetFile', '$blogDescription')";

//             if (mysqli_query($conn, $sql)) {
//                 echo "Records inserted successfully.";

//                 // Delete the uploaded file
//                 unlink($targetFile); // Deletes the file from the server

//             } else {
//                 echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//             }
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     }
// }
}
?>


    <div class="container" style="margin-top:30px">
        <h2 style="font-family:'Playfair Display', serif;text-align:center;">ADD A BLOG</h2>
        <div class="row" style="margin-top:25px;">
            <div class="col-8">
                <form action="addblog.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="blogTitle" style="font-family:'Playfair Display'"><b>Blog Title:</b></label>
                        <textarea class="form-control mt-2 mb-2" id="blogTitle" name="blogTitle" rows="2" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="blogDescription" style="font-family:'Playfair Display'"><b>Blog Description:</b></label>
                        <textarea class="form-control mt-2 mb-2" id="blogDescription" name="blogDescription" rows="4" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="blogImage" style="font-family:'Playfair Display'">Blog Image:</label>
                        <input type="file" class="form-control-file mt-3" id="blogImage" name="blogImage" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        <div class="col-4">
            <div id="previewImage" class="d-none">
                <img id="imagePreview" src="#" alt="Preview" class="img-fluid">
            </div>
        </div>
    </div>
    </div>
    
<script>
    // Show image preview when selecting a file
    document.getElementById("blogImage").addEventListener("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imagePreview").src = e.target.result;
            document.getElementById("previewImage").classList.remove("d-none");
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     
</body>
</html>