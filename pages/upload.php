<?php

require_once '../config.php';
include '../includes/header.php';


  // store the path to your upload directory in a variable
  $uploadDir ="../pages/news";

  if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
    
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
   
    $uploadFile = $uploadDir;
   
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo '<div class="alert alert-success">File uploaded successfully to: ' . htmlspecialchars($uploadFile) . '</div>';
      } else {
        echo '<div class="alert alert-danger">File upload failed!</div>';
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>File upload</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Dateien hochladen</h1>
        </div>
      </div>
      <!-- set the enctype -->
      <form method="post" enctype="YOUR CODE">
        <div class="mb-3">
          <label for="file" class="form-label">File</label>
          <!-- set the accepted file types -->
          <input  accept="YOUR CODE" class="form-control" type="file" id="file" name="file">
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
      </form>
      <div class="row mt-3">
        <div class="col">
          <h2>Files</h2>
        </div>
      </div>
        <div class="row">
          <div class="col">
            <ul class="list-group">
            <?php
              if (file_exists($uploadDir)) {
                $files = scandir($uploadDir);

                for ($i = 2; isset($files[$i]); $i++) {
                  echo '<li class="list-group-item">' . $files[$i] .'</li>';
                }

                if (count($files) == 2) {
                  var_dump($files);
                      echo '<li class="list-group-item">No files...</li>';
                  }
              }
            ?>
            </ul>
          </div>
      </div>
    </div>
  </body>
</html>

<?php include '../includes/footer.php'; ?>