<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
            padding-top: 50px;
        }
        .custom-control-label::before {
            background-color: #495057;
            border-color: #495057;
        }
        .custom-file-label::after {
            background-color: #495057;
            color: #fff;
        }
    </style>
    <style>
        body {
            background-color: transparent;
            color:black;
            padding-top: 0px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top:50px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            background-color: #495057;
            color: #fff;
            border-color: #495057;
        }
        .form-control:focus {
            background-color: #495057;
            color: #fff;
            border-color: #495057;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .custom-file-label::after {
            background-color: #495057;
            color: #fff;
        }
    </style>
  </head>
  <body>
  <?php
    session_start();
     require 'essentials/_navbar.php';
     
    include 'essentials/_dbconnect.php';
    
    if(!isset($_SESSION['login'])) {
      header("location:login.php");
    }
    ?>
    
    <h1 class="mb-3 " style="font-family: 'Arial', sans-serif;margin-left:180px;"><b> ADD BLOG</b></h1>

    <div class="row " style="margin-left:100px;margin-right:100px   ">
        <div class="col-md-8" style="padding-right:50px">
            <form action="process_blog.php" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label for="blogTitle">Blog Title:</label>
                    <input type="text" class="form-control mt-2" id="blogTitle" name="blogTitle" required>
                </div>
                <div class="form-group mt-3">
                    <label for="blogDescription">Blog Description:</label>
                    <textarea class="form-control mt-2" id="blogDescription" name="blogDescription" rows="4" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="blogImage">Blog Image:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input mt-2" id="blogImage" name="blogImage" accept="image/*" required>
                        <label class="custom-file-label mt-2" for="blogImage">Choose file...</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 d-block mx-auto">Submit</button>

            </form>
        </div>
        <div class="col-md-4">
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