<?php 
$con = new PDO('mysql:host=localhost;dbname=feni', 'root', '');

$statement = $con->prepare('select * from teachers');
if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $type = $_GET['type'];
  if ($type === 'email') {
    $statement = $con->prepare("select * from teachers where email like '%$q%'");
  } else {
    $statement = $con->prepare("select * from teachers where name like '%$q%'");
  }
}
$statement->execute();
$teachers = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">

            

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <div class="container">
        <div class="card">
          <div class="card-content">
            <div class="card-title">
              <h2>All teachers</h2>
            </div>
            <form>
              <div class="row">
                <div class="input-field col s12">
                  <label for="search" class="">Search</label>
                  <input type="text" name="q" id="search" class="">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <select name="type">
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                  </select>
                  <label>Type</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button type="submit" class="btn red">search</button>
                </div>
              </div>
              </div>
            </form>
            <table class="table table-bordered">
              <tr>
                <th>Name</th>
                <th>Eamil</th>
              </tr>
              <?php foreach ($teachers as $teacher): ?>
                <tr>
                  <td><?php echo $teacher->name ?></td>
                  <td><?php echo $teacher->email ?></td>
                </tr>
              <?php endforeach ?>
            </table>
          </div>
        </div>
      </div>

      <!--JavaScript at end of body for optimized loading-->
    <!-- Compiled and minified JavaScript -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
    <script>
      
  $(document).ready(function(){
    $('select').formSelect();
  });
        
    </script>
    </body>
  </html>
