<?php
  require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="container">
      <div class="signup">
        <form method="POST" >
          <h2 class="hc">
            <span>ADMIN LOGIN PANEL</span>
            <button type="reset" class="xbtn">X</button>
          </h2>
          <input type="text" class="input" placeholder="Username" name="AdminName">
          <input type="password"class="input" placeholder="Password" name="AdminPass">
          <button type="submit" class="sbtn" name="signin">Login</button>
        </form>
      </div>
    </div>
    <?php
    if(isset($_POST['signin'])){
      $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPass]'";
      $result=mysqli_query($con,$query);
      if(mysqli_num_rows($result)==1)
      {
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminName'];
        header("location: AdminPanel.php");
      }
      else{
        echo "<script>alert('Incorrect Password');</script>";
      }

    }
    ?>
  </body>
</html>
