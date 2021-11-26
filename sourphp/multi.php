<?php

include 'db.php';

if (isset($_POST['delete'])) {

  $all_id =$_POST['check'];
  
  $ed_id =implode(',', $all_id);
  //echo $ed_id;


if (empty($ed_id)){
  header("Location:welcome.php");
}
else{
  $sql = "DELETE FROM user WHERE id IN($ed_id)";
          $result=$conn->query($sql);


if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
   header("Location:welcome.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
}
}
?>