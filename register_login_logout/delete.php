<?php

@session_start();

if(!isset($_SESSION['userID'])){
  echo "<script>alert('you are not authorize')</script>";
  //header('Location: http://myproject.dev/index.html');

}

else{

  include("database.php");

  $ID = $_POST['delete'];
  $select_emp = "DELETE from newEmp where ID='$ID'";
  $run_emp = mysql_query($select_emp);

  header("Location: http://myproject.dev/welcome.php");

}

 ?>
