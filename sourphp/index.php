<?php 
include 'db.php';
include 'sqlcode.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>registration page</title>
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
      <input type="text" placeholder="Input name" name="Name" id="names" class="inp"><br>
           <span id="nerror" class="sp"><?php echo $nameerror;?></span>


         </td>
       </tr>

       <tr>
        <td>Password</td>
        <td>
         <input type="password" placeholder="Input Password" name="Pass" id="pass" class="inp" ><br>
         <span id="perror" class="sp"><?php echo $passerror;?></span>
       </td>
     </tr>

     <tr>
      <td>Email</td>
      <td>
       <input type="text" placeholder="Input Email" name="Email" id="emails" class="inp" ><br>
       <span id="verror" class="sp"><?php echo $emailerror;?></span>


     </td>
   </tr>

   <tr>
    <td>Contact</td>
    <td>
     <input type="text" placeholder="Mobile number" name="Num" id="nums" class="inp"><br>
     <span id="cerror" class="sp"><?php echo $moberror;?></span>


   </td>
 </tr>

 <tr>
  <td>Gender</td>
  <td>
    <input type="radio" name="gender"  value="Male">Male 
    <input type="radio" name="gender"  value="Female">Female
    <input type="radio" name="gender"  value="Other">Other<br>
    <span id="gerror" class="sp"><?php echo $genderror;?></span>

  </td>
</tr>

<tr>
  <td>City</td>
  <td>
    <select name="City" id="city" class="inp">
     <option value="">select</option>
     <option value="delhi">Delhi</option>
     <option value="noida">Noida</option>
     <option value="bhopal">Bhopal</option>
     <option value="indore">Indore</option>
     <option value="nagpure">Nagpure</option>
     <option value="mumbai">Mumbai</option>
   </select><br>
   <span id="cierror" class="sp"><?php echo $cityerror;?></span>


 </td>
</tr>


<td>Language</td>
<td>
 <input type="checkbox" name="click[]" id="check" value="Hindi">Hindi
 <input type="checkbox" name="click[]" id="check" value="English">English
 <input type="checkbox" name="click[]" id="check" value="Gujrati">Gujrati<br>
 <span id="lerror" class="sp"><?php echo $langerror;?></span>
</td>
</tr>

<tr>
  <td>image</td>
  <td>
   <input type="file" id="imgs" name="imgs" value=" " class="inp"><br>
   <span id="ierror" class="sp"><?php echo $imgerror;?></span>


 </td>
</tr>

<tr>
  <td colspan="2">

    <input type="submit" name="submit" value="submit" class="btn" >
  </td>
</tr>
<tr>
  <td colspan="2">
   <center>
     <h4>Already have an account? <a href="/sourphp/login.php">Sign in</a>.</h4>
   </center>
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