<?php 

$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare("insert into teachers (name, email) values
 ('sumon', 'sumon@gmail.com'),
 ('sarwar', 'sarwar@gmail.com'),
 ('arafat', 'arafat@gmail.com'),
 ('helal', 'helal@gmail.com'),
 ('tasnia', 'tasnia@yahoo.com')
 ");

$statement->execute();

echo 'seeding successfully';