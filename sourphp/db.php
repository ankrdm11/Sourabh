<?php

$conn = new mysqli('localhost','root','123456','demo');

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
