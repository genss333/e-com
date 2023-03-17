<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "e-com";

  //create connections
  $conn=mysqli_connect($server,$username,$password,$dbname);
//checked connection
  if (!$conn) {
      die("Connection failed" . mysqli_connect_error());
  }

 ?>