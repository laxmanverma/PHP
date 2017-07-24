<?php
/* to display php error */
error_reporting(E_ALL);
ini_set('display_error',1);

session_start();

include("database.php");

if(isset($_POST['login'])){

  $user_name = mysql_real_escape_string($_POST['uname']);
  $user_pass = mysql_real_escape_string($_POST['psw']);
  // $user_id = "select user_id from employee where user_name='$user_name' AND user_pass='$user_pass'";
  // $user = mysql_query($user_id);
  $select_user = "select * from employee where user_name='$user_name' AND user_pass='$user_pass'";
  $run_user = mysql_query($select_user);

  if(mysql_num_rows($run_user)>0){
    $user_id = mysql_fetch_array($run_user);
    $_SESSION['userID']= $user_id['user_id'];
    // $_SESSION['userId']= $user_id;
    header("Location: http://myproject.dev/welcome.php");
  }
  else{
    echo "<script>alert('username/password incorrect')</script>";
  }

}
?>
