<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Planet</title>
    <link rel="stylesheet" href="head.css">
</head>
<body>
    <header>
        <h2>Computer Planet</h2>
        <nav>
            <a href="index.php">Home</a>
            <a href="aboutus.php">AboutUs</a>
            <a href="contact.php">Contact</a>
            <a href="mycart.php">MyCart</a>            
       </nav>
           <?php
      
                session_start();
                if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin']==true){

                    echo"
                        <div class='user1' style='color: blanchedalmond;'>
                            $_SESSION[LoginId] - <a href='logout.php' style='color: red;'>Logout</a>

                        </div>
                    ";
                } 
                else{
                    echo"
                        <div class='signin'>
                            <a href='login.php'><button type='button' class='btns'>Login</button></a>
                    
                            <a href='regi.php'><button type='button' class='btns'>Register</button></a>
                            </div>
                    ";
                }   
            ?>
    </header>    
</body>
</html>
