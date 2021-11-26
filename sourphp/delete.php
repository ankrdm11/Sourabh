<?php

include 'db.php';

$id =$_GET['id'];

$sql = "DELETE FROM user WHERE id= '$id' ";

 echo $sql;

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
   header("Location:welcome.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

?>