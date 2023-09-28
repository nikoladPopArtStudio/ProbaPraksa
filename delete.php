<?php
require_once 'connection.php';

$id=$_POST['student_id'];
$q= "DELETE FROM `studenti` WHERE `student_id` =".$id.";";
$r = $conn->prepare($q);
$r->execute();
