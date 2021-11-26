<?php

// mysql code

include('db.php');

$error = 0;

if(isset($_POST['submit'])) {
    // code...
  $Name =$_POST['Name'];
  $Pass =$_POST['Pass'];
  $Email =$_POST['Email'];
  $Num =$_POST['Num'];
  $gender =$_POST['gender'];
  $City =$_POST['City'];
  $click =$_POST['click'];
  $imgs =$_POST['imgs'];

  $lang = implode(',', $click);
     // php validation......

  if (empty($Name)) {
    $nameerror = "*please enter Name";
    $error = 1;
  }else if (!ctype_alpha($Name)){
    $nameerror = "*please enter alphabets";
    $error = 1;
  }

  if(empty($Pass)){
    $passerror = "*please enter Password";
    $error = 1;
  }
  if (empty($Email)){
    $emailerror = "*please enter Email";
    $error =1;

  }else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $emailerror = "*please enter valid Email";
    $error =1;
  }

  if (empty($Num)) {
   $moberror = "*please enter contact Number";
   $error =1;
 }else  if (!ctype_digit($Num)) {
  $moberror = "*please enter only digit";
  $error =1;
}
if (empty($gender)) {
 $genderror = "*please select gender";
 $error =1;
}

if (empty($City)) {
 $cityerror = "*please select city";
 $error =1;
}

if (empty($click)) {
 $langerror = "*please select gender";
 $error =1;
}
// for uploading images...............

$allowedTypes = ['image/png' => 'png', 'image/jpeg' => 'jpg'   , 'image/jpeg'  =>'jpeg',   'image/gif' =>'gif' ];
$fileName =basename($_FILES['imgs']['name']);
$targetFilePath = 'img/'.$fileName;
$tmpname = $_FILES['imgs']['tmp_name'];
$fileSize = $_FILES['imgs']['size'];
$filetype =$_FILES['imgs']['type'];
     
if($fileSize <=0) {
  $imgerror = "*please select images";
  $error =1;
} else if(!in_array($filetype, array_keys($allowedTypes))){
  $imgerror = "*please select only jpg, png,jpeg";
  $error =1;
}


     // sql query....
if ($error == 0) {
  
  if(move_uploaded_file($tmpname, $targetFilePath)){
  
   
  }
  
  $sql = "INSERT INTO user(name, password, email, contact, gender, city, language, image) VALUES('$Name', '$Pass', '$Email','$Num', '$gender', '$City', '$lang', '".$targetFilePath."')";
   
    if ($conn->query($sql) === TRUE) {
      //echo "<script>alert('registration successfull please click Sgin in.') </script>";
      header("location:login.php");
    } 
  }



// for login page................ 
  



  
}
?>