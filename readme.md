
# search in php mysql 

~~~php
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');

$statement = $con->prepare('select * from teachers');
if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $statement = $con->prepare("
    select * from teachers where
    name like '%$q%' or
    email like '%$q%'

    ");
}
$statement->execute();
$teachers = $statement->fetchAll();
~~~

# specific search in php mysql 

~~~php
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
~~~
