<?php
/* to display php error */
error_reporting(E_ALL);
ini_set('display_error',1);

session_start();

include("database.php");

if(isset($_POST['submit'])){

  $user_nm = $_POST['uname'];
  $user_pass = $_POST['psw'];
  $user_email = $_POST['email'];

  if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      header("Location: http://myproject.dev/index.html");
    }

  /*if($user_nm=='' OR $user_pass=='' OR $user_email==''){
    echo "<script>alert('Please fill in all fields')</script>";
    header("Location: http://myproject.dev/index.html");
    exit();
  }*/

  else{

    $insert_details = "insert into employee (user_name,user_pass,user_mail) values ('$user_nm','$user_pass','$user_email')";
    mysql_query($insert_details);

    //header("Location: http://myproject.dev/login.html");//The header() function sends a raw HTTP header to a client.
    echo "<script>alert('Successfully registered')</script>";

  }

}

?>
