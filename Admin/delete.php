<?php
include 'connection.php';
if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
    $sql="DELETE FROM `order_manager` WHERE Order_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        $query="DELETE FROM `orders` WHERE Order_id=$id";
        $res=mysqli_query($con,$query);

        echo "<script>alert('Deleted Successfully');
            window.location.href='AdminPanel.php';</script>";
            
    }
    else{
        die(mysqli_error($con));
    }

}


?>