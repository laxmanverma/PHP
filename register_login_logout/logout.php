<?php
session_start();
session_destroy();
header("Location: http://myproject.dev/login.html");
echo "<script>alert(You are Successfully Logout)</script>";
 ?>
