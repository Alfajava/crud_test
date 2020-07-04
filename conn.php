<?php
$host_name = "localhost";
$username = "root";
$password = "";
$mydatabase = "myself";
//create database connection
$conn = new mysqli ($host_name, $username, $password, $mydatabase);

//test connection
if ($conn ->connect_error){
  die("Connection not created: ".$conn ->connect_error);
}
?>
