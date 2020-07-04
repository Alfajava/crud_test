
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/bootstrap.min.js"></script>
<title>Self Evaluation</title>
</head>

<body>
<div class="container">
<h1>Biodata</h1>

<form method="post" action="">
<table border="1" cellspacing="10">

  <tr>
    <td>Firstname</td>
      <td><input type="text" name="firstname"></td>

  </tr>
<tr><td>Lastname</td>
  <td><input type="text" name="lastname"></td></tr>
  <tr><td>email</td>
    <td><input type="text" name="email"></td></tr>
    <tr><td></td>
      <td> <input type="submit" class = "btn btn-default" name="submit"> <input type="reset" class = "btn btn-default" name="reset"></td></tr>

</table>
</form>
</div>
</br>
</br>
</br>
<div class = "container">
<table border="1" cellspacing="20">
<tr><th><td><B>ID</B></td> </th> <th><td><b>SURNAME</b></td></th> <th><td><b>FIRSTNAME</b></td></th> <th><td><b>EMAIL</b></td></th> <th><td><b>QUERY</b></td></th> <th><td><b>UPDATE</b></td></th>
<?php
include "conn.php";
//session_start();
if (isset ($_POST['submit'])){
  //echo "Submit button found";
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
if (filter_has_var(INPUT_POST, 'email')){

  $email =  $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //echo $email;
}

/*  if(filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE){
    echo"<script>alert ('Invalid Email...')</script>";
  } else {
    echo"<script> alert ('Valid Email...')</script>";
  }
  */



  if (!empty($firstname)&&!empty($lastname)&&!empty($email)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE){
        echo"<script>alert ('Invalid Email...')</script>";
      } else {
        //echo"<script> alert ('Valid Email...')</script>";
        $sql = "INSERT INTO users (firstname, lastname, email) VALUE('$firstname', '$lastname', '$email')";
       if($conn->query($sql)){
         echo"Record Saved successfully";
       }else{
         echo "Error: ".$conn->error;
       }
      }

  }
  else {
    echo "Please fill all appropriate fields";
  }

}


$sql_2 = "SELECT * FROM users ORDER BY id";
$result = $conn->query($sql_2);
if($result-> num_rows > 0){
while($row=$result->fetch_assoc()){

//$_SESSION['id'] = $row['id'];
?>

<tr><th><td><B><?php echo $row['id']?></B></td> </th> <th><td><b><?php echo $row['lastname']?></b></td></th> <th><td><b><?php echo $row['firstname']?></b></td></th> <th>
  <!--td><b><?php// echo $row['email']?></b></td></th> <th><td><b><a href = "pract.php?DEL_ID=<?php //echo $row['id']?>">DELETE</a></b></td></th-->
  <td><b><?php echo $row['email']?></b></td></th> <th><td><b><a href = "pract.php?DEL_ID=<?php echo $row['id']?>">DELETE</a></b></td></th>
  <th><td><b><a href = "update.php?ID=<?php echo $row['id']?>">UPDATE</a></b></td></th>

  <?php

}

}

        if (isset ($_GET['DEL_ID'])){
          $del_id = $_GET['DEL_ID'];
          $del_query = "DELETE FROM users WHERE id = '$del_id'";
          if($conn->query($del_query)){
            header('location:pract.php');
            echo "<script> alert('Delete Operation Carried out Successfully')</script>";

          //echo "Delete Operation Successfully Carried Out";
            }
          else{
            echo "Delete Operation not Successfully Carried Out: ". $conn->error();
          }
        }
  ?>

</table>
</div>
</body>

</html>

<?php
/*else {
  echo "Table is empty";
}

/*
$sql = "DELETE FROM users WHERE id='1'";
if (mysqli_query($conn, $sql)){
  echo "Record deleted successfully";
  }

else {
  echo "Record not removed".mysqli_query_error($conn, $sql);
}

$sql = "INSERT INTO users (firstname, lastname, email) VALUE ('Uche','Bala','balauche@gmail.com')";
if (mysqli_query($conn, $sql)){
  echo "Record inserted successfully";
  }

else {
  echo "Record not saved".mysqli_query_error($conn, $sql);
}

if ($conn ->query($sql)){
  echo "Record inserted successfully";
}

else{
  echo "There is an error: ".$conn->error;
}*/
/*
else{
  echo "Connection is established successfully";
}
*/
//$sql = "CREATE DATABASE myself";
//$sqll = "CREATE TABLE users (id int(3) AUTO_INCREMENT PRIMARY KEY, firstname varchar(30)  not null, lastname varchar(40) not null, email varchar(40) not null)";

/*if (mysqli_query($conn, $sql)){
  echo"Database created without any bug to fix";
  echo "</br>";
}
else {
  echo "Database not created".$conn->error;
}*/
/*if(mysqli_query($conn, $sqll)){
  echo"Table created without any bug to fix";
}

else {
  echo "Table not created".$conn->error;
}
*/

?>
