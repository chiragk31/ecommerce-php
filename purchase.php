<?php
session_start();
$con=mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_error())
{
    echo "<script>

        alert('Cannot Connect to Database');            
        window.location.href='mycart.php';
        </script>";
    exit();

}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES ('$_POST[fullname]','$_POST[phoneno]','$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($con,$query1))
        {
            $Order_Id=mysqli_insert_id($con);
            $query2="INSERT INTO `orders`(`Order_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$query2);
         
            if($stmt)
            {
                try{
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_name,$Price,$Quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $Item_name=$values['Item_name'];
                    $Price=$values['Price'];
                    $Quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                   

                }}
                catch(mysqli_sql_exception){
                      echo "<script>
                alert('Order Placed');            
                window.location.href='index.php';
                </script>"; 
            

                }
            
            unset($_SESSION['cart']);
            echo "<script>
                alert('Order Placed');            
                window.location.href='index.php';
                </script>"; 
            

            }

            else{
              echo "<script>
                alert('Sql Prepare Error');            
                window.location.href='mycart.php';
                </script>";              
            }
        }
        else{
            echo "<script>
        alert('Sql Error');            
        window.location.href='mycart.php';
        </script>";            
        }    
    }
}
?>