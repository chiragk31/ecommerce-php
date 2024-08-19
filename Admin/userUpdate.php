<?php
include 'connection.php';
$id=$_GET['updateid'];
$a="SELECT * from `registration` where Id=$id";
$r=mysqli_query($con,$a);
$r1=mysqli_fetch_assoc($r);
$name=$r1['Name'];
$user=$r1['Username'];
$email=$r1['Email'];
$pass=$r1['Password'];

if(isset($_POST['register'])){
    $user="SELECT * FROM `registration` WHERE `Username`='$_POST[username]' OR `Email`='$_POST[email]'";
    $result=mysqli_query($con,$user);
    if($result){

       
            $password=$_POST['password'];
            $sql="INSERT INTO `registration`(`Name`, `Username`, `Email`, `Password`) VALUES ('$_POST[name]','$_POST[username]','$_POST[email]','$password')";
            $id=$_GET['updateid'];
             $sql="UPDATE `registration` set Id=$id,Name='$_POST[name]',Username='$_POST[username]',
             Email='$_POST[email]',Password='$password' where Id=$id";
            if(mysqli_query($con,$sql)){
                 echo "<script>alert('Update Success');
                window.location.href='user.php';
                </script>";
            }
            else{
                 echo "<script>alert('Cannot Update');
                window.location.href='user.php';
                </script>";
            }
        

    }
    else{
        echo "<script>alert('Cannot Register');
        window.location.href='user.php';
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
          <input type="text" class="input" placeholder="Full Name" name="name" value="<?php echo $name;?>">
          <input type="text" class="input" placeholder="Username" name="username" value="<?php echo $user;?>">
          <input type="text" class="input" placeholder="Email" name="email" value="<?php echo $email;?>">
          <input type="password"class="input" placeholder="password" name="password" value="<?php echo $pass;?>">
          <button type="submit" class="sbtn" name="register">Update</button>
          <a href="user.php" class="cancel">Cancel</a>
        </form>
      </div>
    </div>
    
</body>
</html>