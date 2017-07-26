<?php /* Smarty version 2.6.30, created on 2017-07-26 10:47:27
         compiled from login.tpl */ ?>
<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <div class="w3-container w3-teal">
        <label><b><h1 style="text-align:center">EMS</h1></b></label>
    </div>
</head>
<body>

<h2>Login Form</h2>

<form name="login" action="Login.php" method="post">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br /><br />

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br /><br />

    <button type="submit" name="login">Login</button>
    <br />
    <input type="checkbox" checked="checked"> Remember me
  </div>
  <br /><br />
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>