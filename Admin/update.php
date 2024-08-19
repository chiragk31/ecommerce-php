<?php
include 'connection.php';
$id=$_GET['updateid'];
$a="SELECT * from `admin_login` where Id=$id";
$r=mysqli_query($con,$a);
$r1=mysqli_fetch_assoc($r);
$name=$r1['Name'];
$user=$r1['Admin_Name'];
$pass=$r1['Admin_Password'];

if(isset($_POST['register'])){
    $user="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[username]' ";
    $result=mysqli_query($con,$user);
    if($result){

            $password=$_POST['password'];
            $id=$_GET['updateid'];

            $sql="UPDATE `admin_login` set Id=$id,Name='$_POST[name]',Admin_Name='$_POST[username]',Admin_Password='$password' where Id=$id";
            if(mysqli_query($con,$sql)){
                 echo "<script>alert('Update Success');
                window.location.href='adminregi.php';
                </script>";
            }
            else{
                 echo "<script>alert('Cannot Register');
                window.location.href='adminregi.php';
                </script>";
            }
        }


    else{
        echo "<script>alert('Cannot Register');
        window.location.href='adminregi.php';
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
          <input type="text" class="input" placeholder="Name" name="name" value="<?php echo $name;?>">
          <input type="text" class="input" placeholder="Username" name="username" value="<?php echo $user;?>">
          <input type="password"class="input" placeholder="password" name="password" value="<?php echo $pass;?>">
          <button type="submit" class="sbtn" name="register">Update</button>
          <a href="adminregi.php" class="cancel">Cancel</a>
        </form>
      </div>
    </div>
    
</body>
</html>