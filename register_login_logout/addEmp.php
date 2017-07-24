<?php
/* to display php error */
error_reporting(E_ALL);
ini_set('display_error',1);

@session_start();

include("database.php");

if (isset($_POST['submit'])) {

  $emp_id = $_SESSION['userID'];
  // $emp_id = 1;
  $emp_name = $_POST['name'];
  $emp_email = $_POST['email'];
  $emp_dep = $_POST['dep'];

  $insert_details = "insert into newEmp (emp_id,emp_name,emp_email,emp_dep) values ('$emp_id','$emp_name','$emp_email','$emp_dep')";
  mysql_query($insert_details);

  header("Location: http://myproject.dev/welcome.php");

}

?>
