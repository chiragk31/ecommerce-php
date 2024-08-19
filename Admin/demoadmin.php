<?php
require('connection.php');
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: AdminLogin.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        body{
            margin: 0;
        }
        div.header{
            display:flex;
            justify-content: space-between;
            align-items:center;
            padding: 0px 60px;
            background-color: #1c1b31;
            color:white;
            height:58px;


        }
        div.header button{
            background-color: #f0f0f0;
            font-size:16px;
            font-weight:550;
        }
        .nav{
        color: azure;
        font-weight: 500;
        margin-right: 30px;
        
        text-decoration: none;
            }
            .nav1{
                display:flex;
                margin-right:290px;
            }
            .bc{
                
                margin-top:15px;
            } 
            li{
                list-style:none;
            }
            ul li a{
                display:block;
                  font-size: 22px;
                  color:white;
                  text-decoration:none;
            }
            .dropdown li{
                display:block;
            }
            .dropdown{
                
                position:absolute;
                z-index:999;
                display:none;
            }
            ul li:hover ul.dropdown{
                display:block;
                background-color:#2f2e42;
                padding:10px;
                
            }

    </style>
</head>
<body>


<div class="header">
    
    <ul class="bc">
        <li>
        <a href="#"><i class="fas fa-bars" id="btn"></i></a>
        <ul class="dropdown">
        <li><a href="#">Adminregi</a></li>
        <li><a href="#">Contact</a></li>
        </ul>
        </li>
    </ul>
    


    <h3>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']?></h3>
        <!-- <nav class="nav1"> 
            <a href="#" class="nav">Register</a>
            <a href="#" class="nav">Contact</a>

        </nav> -->
        <form method="POST">
            <button  name="logout">logout</button>
        </form>
    </div>

    <?php
        if(isset($_POST['logout'])){
            session_destroy();
            
            header("location: AdminLogin.php");
        }
    ?>
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
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
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

                              
                                
                                <td>
                                    
                                    <button name='delete' class='btn'><a href='delete.php?deleteid=$user_fetch[Order_id]'>Delete</a></button>
                                    <button name='update' class='btn'><a href='update.php?updateid=$user_fetch[Order_id]'>Update</a></button>
                                    
                                    
                                </td>
                                
                                
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