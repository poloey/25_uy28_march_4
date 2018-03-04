<?php 
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');

$statement = $con->prepare('select * from teachers');
if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $type = $_GET['type'];
  if ($type === 'email') {
    $statement = $con->prepare("select * from teachers where email like '%$q%'");
  }else {
    $statement = $con->prepare("select * from teachers where name like '%$q%'");
  }
}
$statement->execute();
$teachers = $statement->fetchAll();
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
    <div class="card">
      <div class="card-header">
        <h2>
          <a href="index.php">All teachers</a>
        </h2> 
      </div>
      <div class="card-body">
        <form class="col-md-6 mx-auto">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="q">
              <div class="input-group-append">
                <select name="type" class="form-control" id="">
                  <option value="name">Name</option>
                  <option value="email">Email</option>
                </select>
              </div>
              <div class="input-group-append">
                <button type="submit" class="btn btn-info">Search</button>
              </div>
            </div>
          </div>
        </form>
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <th>Email</th>
          </tr>
          <?php foreach ($teachers as $teacher): ?>
            <tr>
              <td><?php echo $teacher['name'] ?></td>
              <td><?php echo $teacher['email'] ?></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>