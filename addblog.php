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
?>


    <div class="container" style="margin-top:30px">
        <h2 style="font-family:'Playfair Display', serif;text-align:center;">ADD A BLOG</h2>
        <div class="row" style="margin-top:25px;">
            <div class="col-8">
                <form action="essentials/addblog.php" method="post" enctype="multipart/form-data">
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