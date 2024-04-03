<!--header-->
<header class="header">
        <div class="header_body">
         <a href="index.php" class="logo">TechnoBling</a>
         <nav class="navbar">
            <a href="/index1.php">Add products</a>
            <a href="/view_products.php">view products</a>
            <a href="/shop_products.php">shopit</a>
         </nav>
          <!-- select query -->
          <?php
           $select_product = mysqli_query($conn,"select  * from `cart` ")or die('query failed') ;
           $row_count =mysqli_num_rows($select_product);
         
           ?>
         <!--shopping card icon-->
         <a href="/cart.php"class="cart"><i class="fa-solid fa-cart-shopping"></i><span> <sup><?php echo $row_count?></sup></span></a>
          <!--<div id="menu-btn" class="fas fa-bars"></div>-->
        </div>


        </header>