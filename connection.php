<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'projekatforma';

/* $conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error)
{
  die("nije uspela koneckija." . $conn->connect_error );
}
else
{
  
} */

try 
{
  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e)
{
  $e->getMessage();
}
$query = "SELECT * FROM `studenti`;";
$result = $conn->query($query);
$result->execute();