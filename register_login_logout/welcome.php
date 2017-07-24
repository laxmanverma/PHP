<?php

@session_start();

if(!isset($_SESSION['userID'])){
  echo "<script>alert('you are not authorize')</script>";
  //header('Location: http://myproject.dev/index.html');

}

else{
  include("database.php");
?>

<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {float:left;width:50%}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<button onclick="document.getElementById('id').style.display='block'" style="width:auto;">Add New Employee</button>

<div id="id" class="modal">
  <span onclick="document.getElementById('id').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="addEmp.php" method="post">
    <div class="container">

      <label><b>Name</b></label>
      <input type="text" placeholder="Enter your name" name="name" required>

      <label><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <br />

      <label><b>Department</b></label>
      <input type="text" placeholder="Enter Department" name="dep" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="submit">Submit</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<div>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Department</th>
  </tr>
  <?php

  $user_id = $_SESSION['userID'];
  // echo $user_id;
  $select_emp = "select * from newEmp where emp_id ='$user_id'";
  $run_emp = mysql_query($select_emp);
  // echo $run_emp;
  if($run_emp === FALSE) {
      die(mysql_error()); // TODO: better error handling
  }

  if(mysql_num_rows($run_emp)>0){

    while ($row_emp = mysql_fetch_array($run_emp)) {
      // echo "string";
      $id = $row_emp['ID'];
      $emp_name = $row_emp['emp_name'];
      $emp_email = $row_emp['emp_email'];
      $emp_dep = $row_emp['emp_dep'];

      echo "<tr>
              <th>$id </th>
              <th>$emp_name </th>
              <th>$emp_email </th>
              <th> $emp_dep </th>
            </tr>
            ";

    }

  }
  else{
    echo "No Employee Registered";
  }
  ?>
</table>
</div>
  <br /><br /><br />
  <form name="logout" action="logout.php">
  <button type="submit" name="logout" style="width:auto;">Logout</button>
  </form>

  <br />
  <a href="http://myproject.dev/delete.html">
  <button type="submit" name="delete" style="width:auto;">Delete</button>
  </a>

</body>
</html>

<?php

}
  // echo $_SESSION['userID'];
 ?>
