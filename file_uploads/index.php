<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $file = $_FILES['file'];
  $name = time(). md5('hello') . rand(2000, 30000) . $file['name'];
  $tmp_name = $file['tmp_name'];
  move_uploaded_file($tmp_name, "hello/$name");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input name="file" type="file" class="from-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Upload image</button>
      </div>
    </form>
  </div>
</body>
</html>