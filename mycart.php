<?php include 'header.php';

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyCart</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body{
            background: aliceblue;
      }
      .col {
        text-align: center;

        border: 2px solid black;
        margin: 5px;
        background: grey;
        margin-right: 250px;
        margin-left: 250px;
      }
      .col2 {
        text-align: center;

        border: 2px solid black;
        margin: 5px;
        background: rgb(147 168 198);
        margin-right: 250px;
        margin-left: 250px;
        display: flex;
      }
      .col3{
        margin-top: 30px;
        font-size: 20px;
      }
      .table {
        font-size: 23px;
        padding: 30px;
        margin-left: 80px;
      }
      .bd {
        text-align: center;
        background: rgb(173, 173, 230);
        align-items: center;
      }
      .th {
        background: #6461be;;
        text-align: center;
      }
      .btn{
     outline:none;
       font-weight: 550;
    font-style: 15px;
    color: #eaeef3;
    background-color: #30475e;
    border: none;
    padding: 4px 10px;
    margin-top: 5px;

}
      .btn1{
     outline:none;
       font-weight: 550;
    font-style: 15px;
    color: #eaeef3;
    background-color: #4598ea;
    border: none;
    padding: 4px 10px;
    margin-top: 5px;
    margin-bottom: 5px;

}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>MY CART</h1>
        </div>
        <div class="col2">
          <table class="table">
            <thead class="th">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
                
              </tr>
            </thead>
            <tbody class="bd">
              <?php 
                
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key =>$value){
                      $sr=$key+1;
                      
                        
                        echo "
                            <tr>
                                <td>$sr</td>
                                <td>$value[Item_name]</td>
                                <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                <td>
                                  <form action='manage_cart.php' method='POST'>
                                  <input type='number' class='iquantity' name='mod_quan' onchange='this.form.submit()' value='$value[Quantity]' min='1' max='10'>
                                  <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                  </form>
                                </td>
                                <td class='itotal'></td>
                                <td>
                                    <form action='manage_cart.php' method='POST'>
                                    <button name='Remove_Item'  class='btn'>Remove</button>
                                    <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                    </form>
                                </td>
                            </tr>";
                     } 
                } ?>
              
             
            </tbody>
          </table>
            <div class="col3">
            <h4>Final Price:</h4>
            <h5 id="gtotal"></h5>
            <br>
            <?php
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){

            ?>
            <form action="purchase.php" method="POST">
            <div class="form-check">
              <div class="form-group">
                <label>FullName</label>
                <input type="text" name="fullname" class="form-control" required>
              </div>
              <div class="form-group">
                <label>PhoneNo</label>
                <input type="number" name="phoneno" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
              </div>
              <input class="radio" name="pay_mode" value="COD" type="radio" checked>
              <label for="radio">Cash on Delivary</label>
            </div>
            
              
                <button class="btn1" name="purchase">Purchase</button>
            </form>
            <?php
          }
           ?>
            </div>
            
        </div>
      
      </div>
    </div>
    <script>
      var gt=0;
      var iprice=document.getElementsByClassName('iprice');
      var iquantity=document.getElementsByClassName('iquantity');
      var itotal=document.getElementsByClassName('itotal');
      var gtotal=document.getElementById('gtotal');
      function stotal(){
        gt=0;
        for(i=0;i<iprice.length;i++){
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
            
        }
        gtotal.innerText=gt;
      }
      stotal();
    </script>
  </body>
</html>
