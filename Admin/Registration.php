<?php
if(isset($_POST['register'])){
    include 'connection.php';
    $user="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[username]' ";
    $result=mysqli_query($con,$user);
    if($result){
        if(mysqli_num_rows($result)>0){
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username']){
                echo "<script>alert('$result_fetch[username] -Username already Taken');
                window.location.href='Registration.php';
                </script>";


            }
  
        }
        else{
            $password=$_POST['password'];
            $sql="INSERT INTO `admin_login`(`Name`, `Admin_Name`,  `Admin_Password`) VALUES ('$_POST[name]','$_POST[username]','$password')";
            if(mysqli_query($con,$sql)){
                 echo "<script>alert('Registration Success');
                window.location.href='admindetail.php';
                </script>";
            }
            else{
                 echo "<script>alert('Cannot Register');
                window.location.href='Registration.php';
                </script>";
            }
        }

    }
    else{
        echo "<script>alert('Cannot Register');
        window.location.href='Registration.php';
        </script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>


    <div class="container">
      <div class="signup">
        <form method="post">
          <h2 class="hc">
            <span>Register</span>
            <button type="reset" class="xbtn">X</button>
          </h2>
          <input type="text" class="input" placeholder="Name" name="name">
          <input type="text" class="input" placeholder="Username" name="username">
          <input type="password"class="input" placeholder="password" name="password">
          <button type="submit" class="sbtn" name="register">Register</button>
          <a href="adminregi.php" class="cancel">Cancel</a>
        </form>
      </div>
    </div>
    
</body>
</html>