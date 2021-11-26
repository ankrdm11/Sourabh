<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>show records</title>
  <style>
    table{
        background: Darkkhaki;
    }
    tr,td{
        text-align: center;
        background: Darkkhaki;
        border:1px solid black;
      }
      .btn{
      background-color: gray;
      padding: 5px 10px;
      color: white;
     
}
  .bts{
      background-color:Darkkhaki;
      color: black;
      font-weight: bold;
      
     
}

</style>
</head>
<body>
<center>
<form name="myForm" method="post" >
<table>
<tr>

<center>
<h2>User Details</h2>
</center>
    
    <td>id</td>

    <!-- <td>
        <select id="select" class="inp" onclick="selectall(this.value)">
        <option>choose option</option>
        <option value="select_all">select All</option>
        <option value="deselect_all">unselect All</option>
    </select> 
</td>-->


    
   <td> <input type="button" onclick="hello(this)" value="select all" class="bts" />  
    <input type="button" onClick="toggle(this)" value="Deselect All" class="bts"/></td>
    <td>name</td>
    <td>email</td>
    <td>contact</td>
    <td>gender</td>
    <td>city</td>
    <td>language</td>
    <td>image</td>
    <td colspan="3">Edit details</td>
</tr>
 
 <tr>
    <?php 
include 'db.php';

$sql ="SELECT * FROM user";
$result = $conn->query($sql);



    if($result->num_rows > 0) {
     
  while ($row = $result->fetch_assoc()) {
///////bmwert.......
            $id   = $row ['id'];
            $Name = $row['name'];  
            $Password = $row['password'];
            $Email = $row['email'];  
            $Contact = $row['contact'];
            $Gender = $row['gender'];  
            $City = $row['city'];
            $Language = $row['language'];    
            $images = $row['image'];
            implode('', 'check[]');
    ?>

   <tr>
      <td><?php echo $row['id']; ?></td>
      <td><input class="checks" type="checkbox" id="checks" name="check[]" value="<?php echo $row['id']; ?>" ></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['language']; ?></td>
      <td><img src="<?php echo $row['image']; ?>" height="80px" width="80px"></td> 
      <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> </td> 
      <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    
   </tr>
   <?php
  
  }
    }
?>
<td colspan="2"><input type="submit" name="delete" value="Delete selected records" class="btn"
formaction="multi.php" ></td>
 <span id="nerror" class="sp"><?php echo $deleteerror;?></span>

<td colspan="9">
<input type="submit" name="submit" value="Add user" class="btn" formaction="index.php">


</td>
</tr>
    </table>    
    </form>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
//     document.getElementById('select').onclick = function() {
//     var checkboxes = document.getElementsByName('check[]');
//     for (var checkbox of checkboxes) {
//         checkbox.checked = true;
//     }
// }

// $(document).ready(function()){
//     $('#select').on('change',function(){
//         if (this.value == 'select_all') {
//             $('.checks').each(function(){
//                 this.checked = true;
//             });
//         }else {
//             $('.checks').each(function(){
//                 this.checked =false;

//             });
//         }
//     });

function hello(source) {
  checkboxes = document.getElementsByName('check[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = true;
  }
}
function toggle(source) {
  checkboxes = document.getElementsByName('check[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.unchechked;
  }
}


</script>

</body>
</html>