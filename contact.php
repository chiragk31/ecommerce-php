<?php

if(isset($_POST['submit'])){
include 'connection.php';

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$sql="INSERT INTO `contact`(`Name`, `Email`, `Message`) VALUES ('$name','$email','$message')";

$res=mysqli_query($con,$sql);
if($res){
    echo "<script>alert('Will Respond Shortly');
        window.location.href='contact.php';
    </script>";
}
else{
    die(mysqli_error($con));
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    

</head>
<body>
        <?php
        include 'header.php';
    ?>
    <div class="container">
         
        <h2>Contact Us</h2>
        <form  method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="input" placeholder="Your Name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="input" placeholder="Your Email" required>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" class="input" placeholder="Your Message" required></textarea>
            
            <button type="submit" class="btn12" name="submit">Send</button>
            <!-- <a href="index.php" class="btnc">Cancel</a> -->
            
        </form>
       
    </div>
</body>
</html>

