<?php
 session_start();

 
 include '_dbconnect.php';
 
 if(!isset($_SESSION['login'])) {
     header("location:login.php");
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if file was uploaded without errors
    if(isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0){
        // Open the uploaded file for reading
        $file_handle = fopen($_FILES["profile_picture"]["tmp_name"], "rb");
        if ($file_handle !== false) {
            // Read the contents of the file into a variable
            $file_content = fread($file_handle, filesize($_FILES["profile_picture"]["tmp_name"]));
            fclose($file_handle);

            // Prepare and execute the SQL statement to insert the image content into the database
            $user = $_SESSION['username']; // Assuming you have user authentication and session handling
            $stmt = $conn->prepare("UPDATE `details` SET PROFILEPHOTO = ? WHERE USERNAME = ?");
            $stmt->bind_param("ss", $file_content, $user);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                $_SESSION['imageupdated']=true;
                header("location:/phpproject/editprofile.php");
                echo "Profile picture updated successfully.";
            } else {
                echo "Error updating profile picture.";
            }
            $stmt->close();
        } else {
            echo "Error reading file.";
        }

        // Close database connection
        
    } else {
        echo "Error uploading file.";
    }
}
?>
