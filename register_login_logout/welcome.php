<?php

session_start();

if(!isset($_SESSION['username'])){
  echo "<script>alert('you are not authorize')</script>";
  //header('Location: http://myproject.dev/index.html');

}

else{
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>welcome</h2>
<br /><br /><br />
<form name="logout" action="logout.php">
<button type="submit" name="logout">Logout</button>
</form>
</body>
</html>

<?php
}

 ?>
