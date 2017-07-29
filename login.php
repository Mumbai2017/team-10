<?php
   if (isset($_POST['submit'])) {
   include("config.php");
   session_start();
   
   
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
      
      $sql = "SELECT role FROM roles,users WHERE user_id = '$myusername' and password= '$mypassword' and roles.role_id=users.role_id";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
     
	  
	  
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		 
		  
		   $role=$row["role"];
		  
		  
        echo $role;
         $_SESSION['login_user'] = $myusername;
        if($role=="Teacher")
			header('location: unit_plan.php');  
		else if($role=="SME")
		  header('location: welcome_sme.php');
		else if($role=="admin")
				header("location: welcome_admin.php");
		
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   
 }
?>


<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content= "width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

.format{
width:100%;
max-width:500px;
margin:0px auto;
}


.jumbotron{
background-color:#0000;
}


hr
{
  width: 70px; 
  border: 1px solid #ffa300;
  margin: 30px auto;
}


.section_header
{
  width: 100%;
  max-width: 500px;
  letter-spacing: 1px;
  text-align: center;
  margin: 0px auto;
  margin-bottom: 20px;
}


</style>

</head>

<body >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container">

<div class="section_header">
       <h2>Sign In to CEQUE...</h2>
</div>
<hr>
<div class="format">
  <form action="" method="POST" >
    <div class="form-group">
	
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
	</div>
    <center><button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button></center>
	<div style="color:red;text-align:center;">
	<?php if(isset($error))
	{
		    echo $error;
		}
	?>
	</div>
  </form>
</div>


</body>

</html>