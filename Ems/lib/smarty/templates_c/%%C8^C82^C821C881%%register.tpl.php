<?php /* Smarty version 2.6.30, created on 2017-07-26 10:25:16
         compiled from register.tpl */ ?>
<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <div class="w3-container w3-teal">
        <label><b><h1 style="text-align:center">EMS</h1></b></label>
    </div>
</head>
<body>

<h1>Register Here</h1>

<form name="register" action="./Register.php" method="post" >

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br /><br />

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br /><br />

    <label><b>eMail</b></label>
    <input type="email" name="email">
    <br /><br /><br />

    <button type="submit" name="submit">Register</button>
    <br /><br />

  </div>

</form>
<a href="http://myproject.dev/Ems/Login.php"><button>Login</button></a>
</body>
<br /><br />

<div class="w3-container w3-teal">
    <label><b><h1>This is Footer</h1></b></label>
</div>

</html>