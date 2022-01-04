<?php
   include("config.php");
   session_start();
?>
<html>
   
   <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>SQL Database Ecam Factory</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
        <script src='main.js'></script>
    </head>
      <?php
	   $error ="";
      if($_SERVER["REQUEST_METHOD"] == "POST") {
         // username and password sent from form 
         
         $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
         
         $sql = "SELECT id FROM admin WHERE `username` = '$myusername' and `password` = '$mypassword';";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        // $active = $row['active'];
   
         $count = mysqli_num_rows($result);
         
         // If result matched $myusername and $mypassword, table row must be 1 row
         
         if($count == 1) {
         //   session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            
            
            header("location: welcome.php");
         }else {
            $error = "Your Login Name or Password is invalid";
         }
      }

      ?>
      <div class = head1>
      <img src="logo.png" class ="logo" alt="Logo Ecam"> 
      </div>
      
      <div class =core>
         <div class=login>
            <div class = loginhead>
               <div class =logintitle><b>Login</b></div>
               
               <div class=logininput>
                  
                  <form action = "" method = "post">
                     <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br/>
                     <label>Password  :</label><input type = "password" name = "password" class = "box" />
                     <input type = "submit" value = " Submit " class = "submit"/><br />
                  </form>
                  
                  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                  
               </div>
               
            </div>
            
         </div>
   </div>
   </body>
</html>