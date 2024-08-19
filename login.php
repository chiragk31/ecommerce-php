<?php
require('connection.php');


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="login.css">

  </head>
  <body>
     

    <div class="container" >
      <div class="signup">
        <form method="POST">
          <h2 class="hc">
            <span>SignUp</span>
            <button type="reset" class="xbtn">X</button>
          </h2>
          <input type="text" class="input" placeholder="Username or email" name="username">
          <input type="password"class="input" placeholder="Password" name="password">
          <button type="submit" class="sbtn" name="login">Login</button>
          <a href="index.php" class="cancel">Cancel</a>
        </form>
        
        <a href="regi.php">Don't have an account?Register</a>
      </div>
    </div>
    <?php
      if(isset($_POST['login'])){
        $query="SELECT * FROM `registration` WHERE `Username`='$_POST[username]' OR `Email`='$_POST[username]' AND  `Password`='$_POST[password]'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
          session_start();
          $_SESSION['Loggedin']=true;
          $_SESSION['LoginId']=$_POST['username'];
          header("location: index.php");
        }
        else{
          echo "<script>alert('Incorrect Password');</script>";
        }

      }
    ?>
  </body>
</html>
