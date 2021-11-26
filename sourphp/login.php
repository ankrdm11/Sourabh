<?php 
 include('db.php');
 $error = 0;

 if(isset($_POST['Login'])) {
    $Name =$_POST['Name'];
    $Pass =$_POST['Pass'];

    if (empty($Name)) {
    $nameerror = "*please enter Name";
    $error = 1;
  }
  if(empty($Pass)){
    $passerror = "*please enter Password";
    $error = 1;
  }
  //sql query....
  if ($error == 0){
      $sql= "SELECT * FROM user WHERE name='$Name' AND password='$Pass'";
      $result=$conn->query($sql);
      $row = $result->fetch_array();
       
      echo $sql;
     if ($result === 1){
            header("Location:welcome.php");
         } else {
        echo "username and password not match" . $conn->error;

         }
     }
  }


?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
	<title>Login page</title>
</head>
<body>
	<center>
	<form name="myForm"  method="post">
    <table>
    <tr>
    <td colspan="2">
       <center>
           <h2>Login please</h2>
       </center>
     </td>
        </tr>

         <tr>
          <td>Userame</td>
            <td>
           <input type="text" placeholder="Input name" name="Name" id="names" class="inp"><br>
           <span id="nerror" class="sp"><?php echo $nameerror;?></span>
         </td>
        </tr>


         <tr>
          <td><br></td>
            
        </tr>

         <tr>
          <td>Password</td><br>
            <td>
           <input type="text" placeholder="Input Password" name="Pass" id="pass" class="inp"><br>
           <span id="perror" class="sp"><?php echo $passerror;?></span>
            </td>
        </tr>

        <tr>
            <td colspan="2"> <br>
              <input type="submit" value="submit" name="Login" class="btn">
              </td>
        </tr>
         <tr>
        <td colspan="2">
       <center>
           <h4>Don't have an account? <a href="index.php">Register here</a>.</h4>
       </center>
     </td>
        </tr>

</table>
</form>
</center>
<!-- <script src="reg.js"></script> -->
</body>
</html>