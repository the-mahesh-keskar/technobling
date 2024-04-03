<?php include 'connect.php';
if(isset($_POST['add_to_cart']))
{  
    $products_name =$_POST['product_name'];
    $products_price =$_POST['product_price'];
    $products_image =$_POST['product_image'];
    $product_quantity =1 ;

    //slect cart quary 
    $select_cart =mysqli_query($conn,"select * from `cart` where name='$products_name'");
    if(mysqli_num_rows($select_cart)>0)
    {
        $display_message[] ="product already added to cart !!!" ;
    }
    else
    {
//insert cart data in cart in table
$insert_products =mysqli_query($conn, "insert into `cart` (name,price,image,quantity) values
('$products_name','$products_price', '$products_image','$product_quantity')") ;
$display_message []= "product added to cart " ;
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop products</title>
    <link rel="stylesheet" href="/shopping1.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!--hesder -->
    <?php include 'header5.php' ?>

  
    <div class="container">
    <?php  
  if (isset($display_message)) {
    foreach( $display_message as $display_message)
    {

   echo"<div class='display_message'>
   <span>$display_message</span>
   <i class='fas fa-times' onClick='this.parentElement.style.dispaly=`none`';></i>
 </div>";
    }
  }
  
  ?>
        <section class="products">
            <h1 class="heading">Lets Shop</h1>
            <div class="product_container">
                <?php
                $select_products =mysqli_query($conn,"select * from `products`");
                if (mysqli_num_rows($select_products)>0) {
                 while  ( $fetch_product =mysqli_fetch_assoc($select_products)) 
              //  echo $fetch_product['name'];
                {      
                     ?>
          <form action="" method="post">
                <div class="edit_form">
                    <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                    <h3><?php echo $fetch_product['name'] ?></h3>
                    <div class="price">price:<?php echo $fetch_product['price'] ?>/-</div>
                    <input type="hidden" name="product_name" value=" <?php echo $fetch_product['name'] ?>">
                    <input type="hidden" name="product_price" value=" <?php echo $fetch_product['price'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'] ?>">
                    <input type="submit" class="submit_btn cart_btn" value="Add to cart" name="add_to_cart">
                </div>
             </form> 
             <?php
                  }      
                } 
                
                else{
                    echo "<div class ='empty_text'>no products avalable</div>";
                }
                ?>
            
            </div>
        </section>
    </div>
</body>
</html>