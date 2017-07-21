<?php
session_start();
session_destroy();
header("Location: http://myproject.dev/index.html");
echo "<script>alert(You are Successfully Logout)</script>";
 ?>
