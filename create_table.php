<?php 

$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement1 = $con->prepare('drop table if exists teachers');
$statement2 = $con->prepare("
  create table teachers (
    id serial,
    name varchar(30),
    email varchar(30)
  )
 ");
$statement1->execute();
$statement2->execute();
