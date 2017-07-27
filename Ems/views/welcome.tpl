<html>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="views/login.css" >
    
<head>
    <div class="w3-container w3-teal">
        <label><b><h1 style="text-align:center">EMS</h1></b></label>
    </div>
</head>

<body>
    <button onclick="document.getElementById('id').style.display='block'" style="width:auto;">Add New Employee</button>
    
    <form name="logout" action="Logout.php">
        <button type="submit" name="logout" style="width:auto;">Logout</button>
    </form>
    
    <div id="id" class="modal">
      <span onclick="document.getElementById('id').style.display='none'" class="close" title="Close Modal">×</span>
      <form class="modal-content animate" action="./AddEmp.php" method="post">
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
    
    <div>
        
    <fieldset style="margin :0;"><legend>Details</legend>  
    <table style="width:100%;border :5px solid black;">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Delete</th>
     
    {foreach from=$data key=k item=l}
            <tr>
              <th>{$l.ID}</th>
              <th>{$l.empname}</th>
              <th>{$l.empemail}</th>
              <th>{$l.department}</th>
            <form action='Delete.php' method="post">
                <input type='hidden' name="ID" value="{$l.delete}">
              <th><button type='submit' name="delete">Delete</button></th>
            </form>
{*              <th>{$l.delete}</th>*}
            </tr>
    {/foreach}
            
    </table>
    </fieldset>
</body>

</html>