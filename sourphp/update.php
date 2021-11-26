<?php 
include 'db.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$id =$_GET['id'];
 
      

$sql    = "SELECT * FROM user WHERE id='$id'";
          $result = $conn->query($sql);
          while($row = $result->fetch_array()){

           
            $Name = $row['name'];  
            $Password = $row['password'];
            $Email = $row['email'];  
            $Contact = $row['contact'];
            $Gender = $row['gender'];  
            $City = $row['city'];
            $Language = $row['language'];    
            $images = $row['image'];

    

//update records...........

             $error = 0;

            if(isset($_POST['update'])){
              $Name =$_POST['Name'];
              $Pass =$_POST['Pass'];
              $Email =$_POST['Email'];
              $Num =$_POST['Num'];
              $gender =$_POST['gender'];
              $City =$_POST['City'];
              $click =$_POST['click'];
              $imgs =$_POST['img'];

              $lang = implode(',', $click);
 
 //for validation..............

             // $lang = implode(',', $click);
              $allowedTypes = ['image/png' => 'png', 'image/jpeg' => 'jpg'   , "image/jpeg"  =>"jpeg",   "image/gif" =>"gif" ];

if (empty($Name)){
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

      //die();
$fileSize = $_FILES['imgs']['size'];
$filetype =$_FILES['imgs']['type'];

  if ($fileSize <=0) {
    $imgerror = "*please select images";
    $error =1;
  } else if(!in_array($filetype, array_keys($allowedTypes))){
    $imgerror = "*please select only jpg, png,jpeg";
    $error =1;
  }
      if(move_uploaded_file($tmpname, $targetFilePath)){

          $sql = "UPDATE user SET name='$Name' , password='$Pass' , email='$Email', contact='$Num', gender='$gender', city='$City', language='$lang', image='".$targetFilePath."'  WHERE id='$id' ";

          if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
          header("Location:welcome.php");
         } else {
        echo "Error updating record: " . $conn->error;
        }
      }
    }
 }
?>

<!DOCTYPE html>
<html>

<head>
<title>update page</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!--html form  -->
<center>
  <form name="myForm" onsubmit="return validateForm()" method="post" enctype= "multipart/form-data">
    <table>
      <tr>
        <td colspan="2">
         <center>
           <h2>Register please</h2>
         </center>
       </td>
       <tr>
        <td>Userame</td>
        <td>
    <input type="text" placeholder="Input name" name="Name" id="names" class="inp" value="<?php echo $Name ?>"><br>
         <span id="nerror" class="sp"><?php echo $nameerror;?></span>


       </td>
     </tr>

     <tr>
      <td>Password</td>
      <td>
       <input type="password" placeholder="Input Password" name="Pass" id="pass" class="inp" value="<?php echo $Password ?>"><br>
       <span id="perror" class="sp"><?php echo $passerror;?></span>
     </td>
   </tr>

   <tr>
    <td>Email</td>
    <td>
     <input type="text" placeholder="Input Email" name="Email" id="emails" class="inp" value="<?php echo $Email ?>"><br>
     <span id="verror" class="sp"><?php echo $emailerror;?></span>


   </td>
 </tr>

 <tr>
  <td>Contact</td>
  <td>
   <input type="text" placeholder="Mobile number" name="Num" id="nums" class="inp" value="<?php echo $Contact ?>"><br>
   <span id="cerror" class="sp"><?php echo $moberror;?></span>


 </td>
</tr>

<tr>
<td>Gender</td>
<td>
  <input type="radio" name="gender" <?php if(isset($Gender) && ($Gender=="Male")){ echo 'checked';} ?> value="Male">Male 
  <input type="radio" name="gender" <?php if(isset($Gender) && ($Gender=="Female")){ echo 'checked';} ?> value="Female">Female
  <input type="radio" name="gender" <?php if(isset($Gender) && ($Gender=="Other")){ echo 'checked';} ?> value="Other">Other<br>
  <span id="gerror" class="sp"><?php echo $genderror;?></span>

</td>
</tr>

<tr>
<td>City</td>
<td>
  <select name="City" id="city" class="inp">
   <option value="">select</option>
   <option <?php if(isset($City) && ($City== "delhi")){ echo 'selected';} ?>value="delhi">Delhi</option>
   <option <?php if(isset($City) && ($City== "noida")){ echo 'selected';} ?> value="noida">Noida</option>
   <option <?php if(isset($City) && ($City== "bhopal")){ echo 'selected';} ?> value="bhopal">Bhopal</option>
   <option <?php if(isset($City) && ($City== "indore")){ echo 'selected';} ?> value="indore">Indore</option>
   <option <?php if(isset($City) && ($City== "nagpure")){ echo 'selected';} ?> value="nagpure">Nagpure</option>
   <option <?php if(isset($City) && ($City== "mumbai")){ echo 'selected';} ?> value="mumbai">Mumbai</option>
 </select><br>
 <span id="cierror" class="sp"><?php echo $cityerror;?></span>


</td>
</tr>


<td>Language</td>
<td>
<input type="checkbox" name="click[]" id="check" <?php if(isset($Language) && ($Language=="Hindi")){ echo "checked='checked'";} ?>value="Hindi">Hindi
<input type="checkbox" name="click[]" id="check" <?php if(isset($Language) && ($Language=="English")){ echo "checked='checked'";} ?>value="English">English
<input type="checkbox" name="click[]" id="check" <?php if(isset($Language) && ($Language=="Gujrati")){ echo "checked='checked'";} ?>value="Gujrati">Gujrati<br>
<span id="lerror" class="sp"><?php echo $langerror;?></span>
</td>
</tr>

<tr>
<td>image</td>
<td>
 <input type="file" id="img" name="imgs" value="" class="inp"><br>
 <span id="ierror" class="sp"><?php echo $imgerror;?></span>


</td>
</tr>

<tr>
<td colspan="2">

  <input type="submit" name="update" value="Update" class="btn">
</td>
</tr>



</table>
</form>
</center>

<!--link js file -->


<!--
<script src="reg.js">
  
</script> 
-->

</body>
</html>