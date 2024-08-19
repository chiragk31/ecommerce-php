<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="utils.css">
</head>
<body>
<?php 
include 'header.php';?>
<main>
  <hr>
  <div class="card">
    <h2 class="my-2">Graphic Khazana</h2>
    <div class="cards">
      <form action="manage_cart.php" method="POST">
      <div class="card-item">
        <img src="imges/g1.webp" alt="" width="200px" height="138px"/>
        <div class="lines">
          <p class="text-center my-1">Gforce rtx 4060</p>
          <p class="text-center my-1">Price:30,500 Rs</p>
           <input type="hidden" name="Item_name" value="Gforce rtx 4060">
            <input type="hidden" name="Price" value="30500">

          <button name="addtocart" class="btn" >Buy Now</button>
        </div>
      </div>
        </form>
        <form action="manage_cart.php" method="POST">
      <div class="card-item">
        <img
          src="imges/g2.webp"
          alt=""
          width="200px"
          height="138px"
        />
        <div class="lines">
          <p class="text-center my-1">Gforce rtx 4060ti</p>
          <p class="text-center my-1">31000 Rs</p>
          <input type="hidden" name="Item_name" value="Gforce rtx 4060ti">
            <input type="hidden" name="Price" value="31000">

          <button name="addtocart" class="btn" >Buy Now</button>
          
        </div>
      </div>
      </form>
      <form action="manage_cart.php" method="POST">
      <div class="card-item">
        <img
          src="imges/g3.webp"
          alt=""
          width="200px"
          height="138px"
        />
        <div class="lines">
          <p class="text-center my-1">Gforce rtx 4070</p>
          <p class="text-center my-1">Price:40,000 Rs</p>
          <input type="hidden" name="Item_name" value="Gforce rtx 4070">
            <input type="hidden" name="Price" value="40000">

          <button name="addtocart" class="btn" >Buy Now</button>
          
        </div>
      </div>
      </form>
     
    </div>
  </div>
</div>
</main>
</body>
</html>