<?php
session_start();
include '_dbconnect.php';


if(!isset($_SESSION['login'])) {
    header("location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogTitle = $_POST['blogTitle'];
    $blogDescription = $_POST['blogDescription'];
    $timestamp = date("Y-m-d H:i:s");
   
    if(isset($_FILES["blogImage"]) && $_FILES["blogImage"]["error"] == 0){
        // Open the uploaded file for reading
        $file_handle = fopen($_FILES["blogImage"]["tmp_name"], "rb");
        if ($file_handle !== false) {
            // Read the contents of the file into a variable
            $file_content = fread($file_handle, filesize($_FILES["blogImage"]["tmp_name"]));
            fclose($file_handle);
        
            // Prepare and execute the SQL statement to insert the image content into the database
            $user = $_SESSION['username']; // Assuming you have user authentication and session handling
            $stmt = $conn->prepare("INSERT INTO `blogs` (`BLOGTITLE`, `BLOGIMAGE`, `BLOGDESC`, `BLOGUSERNAME`, `BLOGTIMESTAMP`) VALUES (?,?,?,?,?);");
            $stmt->bind_param("sssss",$blogTitle, $file_content,$blogDescription, $user,$timestamp);
            $stmt->execute();
            echo 'timpstamp';

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                
            } else {
                echo "Error updating profile picture.";
            }
            $stmt->close();
        } else {
            echo "Error reading file.";
        }
    }
}
 ?>   