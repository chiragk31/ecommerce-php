<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pay Mode</th>
                            <th scope="col">Orders</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query1="SELECT * FROM `order_manager`";
                        $user_result=mysqli_query($con,$query1);
                        
                        while($user_fetch=mysqli_fetch_assoc($user_result)){
                            echo "
                                <tr>
                                <td>$user_fetch[Order_id]</td>
                                <td>$user_fetch[Full_Name]</td>
                                <td>$user_fetch[Phone_No]</td>
                                <td>$user_fetch[Address]</td>
                                <td>$user_fetch[Pay_Mode]</td>
                              
                                <td>
                                    <table class='table text-center'>
                                        <thead>
                                            <tr>
                                            <th scope='col'>Item Name</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Quantity</th>
                            
                                            </tr>
                                    
                                        </thead>
                                <tbody>
                            ";
                            $query2="SELECT * FROM `orders` WHERE `Order_id`='$user_fetch[Order_id]'";
                            $order_result=mysqli_query($con,$query2);
                            while($order_fetch=mysqli_fetch_assoc($order_result)){
                                echo"
                                    <tr>
                                    <td>$order_fetch[Item_Name]</td>
                                    <td>$order_fetch[Price]</td>
                                    <td>$order_fetch[Quantity]</td>
                                
                                    </tr>
                                 

                                ";

                            }


                            echo "
                                
                                </tbody>
                                    </table>

                              
                                
                               
                                
                                </td>
                                </tr>
                                
                                ";

                        }
                    ?>
                    
                        
                        
                     </tbody>
                 </table>
            </div>
        </div>
</div>
    
</body>
</html>