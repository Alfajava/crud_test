<?php
include ("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/bootstrap.min.js"></script>
<title>Self Evaluation</title>
</head>

<body>
<div class="container">
<h1>Update Biodata</h1>
<?php
//if(isset($_GET['ID'])){
  $search_id = $_GET['ID'];
  //session_start();
  //$id = $_SESSION['id'];
//echo $id;
  $sql_display = "SELECT * FROM users WHERE id = '$search_id'";
  $output_var = ($conn->query($sql_display));
    if($output_var-> num_rows > 0) {
    while ($rows = $output_var->fetch_assoc()){

        /*$id = $_POST['id'];
          $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];*/
      //    }
  //  }
//}

//  $update_query = "UPDATE users SET id = '' "
?>
<form method="post" action="">
<table border="1" cellspacing="10">

  <tr>
    <td>User-ID</td>
      <td><input type="text" name="id"  value = "<?php echo $rows['id']?>" readonly></td>

  </tr>
  <tr>
    <td>Firstname</td>
      <td><input type="text" name="firstname" value = "<?php echo $rows['firstname']?> "></td>

  </tr>
<tr><td>Lastname</td>
  <td><input type="text" name="lastname" value = "<?php echo $rows['lastname']?>"></td></tr>
  <tr><td>email</td>
    <td><input type="text" name="email" value = "<?php echo $rows['email'] ?>"></td></tr>
    <tr><td></td>
      <td> <input type="submit" class = "btn btn-default" name="update"> <input type="reset" class = "btn btn-default" name="reset"></td></tr>
</table>
</form>
</div>

<?php
}

}

if (isset($_POST['update'])){
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
if (!empty ($id) && !empty ($firstname) && !empty ($lastname) && !empty ($email)){
  $new_sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email' WHERE id = '$id' ";
  if ($conn->query($new_sql)){
    //echo "Update Done successfully";
    echo "<script>alert('Update done successfully')</script>";
    //  echo "<script>window.open('pract.php', '_self')</script>";
    header ('location:pract.php');

}else {
  echo "Fatal Error: ".$conn->error;
}
}else {
echo "Please fill all fields and proceed";
}

}

?>



</body>
</html>
