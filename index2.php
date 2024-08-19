<?php

  require_once 'connection.php';

  $sql = "SELECT * FROM product";
  $all_product = $con->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Computer Planets</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="utils.css" />
  </head>
  <body>
    <?php
        include 'header.php';
    ?>
    <main>
        
      <div class="container">
        <div class="slider">
          <a class="img11" href="img1.php"
            ><img src="imges/Zotac.webp" alt=""
          /></a>
          <a class="img12" href="img2.php"
            ><img
              src="imges/HyperX_d112f82b-4c3c-47e8-8680-859dc68c0560.webp"
              alt=""
          /></a>
        </div>
        <hr />

        <div class="card">
          <h2 class="my-2">Latest Arrivals!!</h2>
          <div class="cards">
            
<?php
          while($row = mysqli_fetch_assoc($all_product)){
       ?>
            <!-- Demo -->
            <form action="manage_cart.php" method="POST"> 
            <div class="card-item">
              <img src="<?php echo $row["Image"];?>" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1"><?php echo $row["Name"];?></p>
                <p class="text-center my-1">Price:<?php echo  $row["Price"];?>Rs</p>
                <input type="hidden" name="Item_name" value="<?php echo $row["Name"];?>">
                  <input type="hidden" name="Price" value="<?php echo $row["Price"];?>">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
        <?php
          }
        
        ?>
            
          </div>
        </div>
        <!-- card2 -->
        <hr />
        <div class="card">
          <h2 class="my-2">Best Deals Grab it Now!</h2>
          <div class="cards">
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/ram1.webp" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">Adata 16gb Ram</p>
                <p class="text-center my-1">Price:5,450 Rs</p>
                <input type="hidden" name="Item_name" value="Adata 16 Ram">
                  <input type="hidden" name="Price" value="5450">

                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/ram2.jpg" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">Gskillz 16gb Ram</p>
                <p class="text-center my-1">Price:5,700 Rs</p>
                <input type="hidden" name="Item_name" value="Gskillz">
                  <input type="hidden" name="Price" value="5700">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/mo2.jpg" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">LG Ultra 144hz</p>
                <p class="text-center my-1">Price:1,234 Rs</p>
                <input type="hidden" name="Item_name" value="LG Ultra 144hz">
                  <input type="hidden" name="Price" value="1234">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/p2.webp" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">Ant Esports(mid range)</p>
                <p class="text-center my-1">Price:45,000 Rs</p>
                <input type="hidden" name="Item_name" value="Ant Esports(mid range)">
                  <input type="hidden" name="Price" value="29000">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/ssd1.webp" alt="" width="200px" height="140px" />
              <div class="lines">
                <p class="text-center my-1">Crucial 512Gb SSD</p>
                <p class="text-center my-1">Price:3549 Rs</p>
                <input type="hidden" name="Item_name" value="Crucial 512GB SSD">
                  <input type="hidden" name="Price" value="3549">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/bo2.jpg" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">Gigabite h210m</p>
                <p class="text-center my-1">6,845 Rs</p>
                <input type="hidden" name="Item_name" value="Gigabite h210m">
                  <input type="hidden" name="Price" value="6845">
                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
            <form action="manage_cart.php" method="POST">
            <div class="card-item">
              <img src="imges/mp1.jpg" alt="" width="200px" height="138px" />
              <div class="lines">
                <p class="text-center my-1">Crucial MousePad</p>
                <p class="text-center my-1">Price:1,529 Rs</p>
                <input type="hidden" name="Item_name" value="Crusial MousePad">
                  <input type="hidden" name="Price" value="1529">

                <button class="btn" name="addtocart">Buy Now</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <?php include 'footer.php'?>

  </body>
</html>
