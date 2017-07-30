<?php 
   include("config.php");
   session_start();
   
        // username and password sent from form 
        echo $_SERVER["QUERY_STRING"];
        
        
        /*$sql = "SELECT role FROM roles,users WHERE user_id = '$myusername' and password= '$mypassword' and roles.role_id=users.role_id";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
      
        $count = mysqli_num_rows($result);     
        // If result matched $myusername and $mypassword, table row must be 1 row
      
        if($count == 1) { 
         $role=$row["role"];
          //$_SESSION['username']=$myusername;
          $_SESSION['role']=$role;
          echo $role;
          if($role=="Teacher")
            header('location: unit_plan.php');  
          else if($role=="SME")
            header('location: welcome_SME.php');
          else if($role=="admin")
            header("location: welcome_admin.php");
        }else {
           $error = "Your Login Name or Password is invalid";
        }
      }
   } else {
      if($_SESSION['role']=="Teacher")
        header('location: unit_plan.php');  
      else if($_SESSION['role']=="SME")
        header('location: welcome_SME.php');
      else if($_SESSION['role']=="admin")
        header("location: welcome_admin.php");
   }*/
?>