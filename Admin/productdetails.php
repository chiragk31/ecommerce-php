<?php
require('connection.php');
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: AdminLogin.php");

}
?>
<?php
include 'connection.php';
if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
    $sql="DELETE FROM `product` WHERE Id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        $query="DELETE FROM `product` WHERE Id=$id";
        $res=mysqli_query($con,$query);

        echo "<script>alert('Deleted Successfully');
            window.location.href='productdetails.php';</script>";
            
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
    <title>AdminPanel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css">
     
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
            background: #042331;
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
            .regiadmin{
            text-decoration: none;
            font-size: 25px;
            color: darkblue; 
            display: flex;
            justify-content: center;
            padding-top: 42px;
            padding-left: 142px;
            background-color: whitesmoke;
            padding-bottom: 34px;
        }


    </style>
</head>
<body>


<div class="header">
    
<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar" style="margin-top: 790px;">
    <header>My App</header>
    <ul>
     <li><a href="AdminPanel.php">Orders</a></li>
     <li><a href="user.php">UserDetails</a></li>
     <li><a href="Adminregi.php">AdminRegister</a></li>
     <li><a href="message.php">Messages</a></li>
    <li><a href="productdetails.php">ProductDetails</a></li>    

    </ul>
   </div>


    <h3>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']?></h3>

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
        <a href="product.php" class="regiadmin">Add Product</a>
  <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">ProductName</th>
                            <th scope="col">ProductPrice</th>
                            <th scope="col">Image</th>
                            
                            
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query1="SELECT * FROM `product`";
                        $user_result=mysqli_query($con,$query1);
                        
                        while($user_fetch=mysqli_fetch_assoc($user_result)){
                            echo "
                                <tr>
                                <td>$user_fetch[Id]</td>
                                <td>$user_fetch[Name]</td>
                                <td>$user_fetch[Price]</td>
                                <td>$user_fetch[Image]</td>
                                <td>
                                    
                                    <table class='table text-center'>
                                    <tbody>
                                ";
                                echo"
                                    </tbody>
                                        </table>
                                    

                                    <td>
                                    
                                    <button name='delete' class='btn' style='background: red;'><a href='productdetails.php?deleteid=$user_fetch[Id]' style='text-decoration: none;color: #ffd8d8;'>Delete</a></button>

                                    
                                    
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