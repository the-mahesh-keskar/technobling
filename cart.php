
<?php include 'connect.php' ;
// update query
if(isset($_POST['update_product_quantity']))
{
    $update_value =$_POST['update_quantity'];
    //echo $update_value ;
    $update_id =$_POST['update_quantity_id'];
   // echo $update_id ;
   $update_quantity_query= mysqli_query($conn, "update  `cart` set 
   quantity =$update_value where id =$update_id");
   if ($update_quantity_query) {
     header('lacation:cart.php');
   }
}
if(isset($_GET['remove']))
{
    $remove_id =$_GET['remove'];
   // echo $remove_id ;
  mysqli_query($conn,"delete from  `cart` where  id= $remove_id") ;
header('localhost:cart.php') ;
}


if(isset($_GET['delete_all']))
{
    mysqli_query($conn,"delete from  `cart`");
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart </title>
    <link rel="stylesheet" href="/shopping1.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <!--- headder -->
<?php include 'header5.php' ; ?> 
<div class="container">
    <section class="shopping_cart">
        <h1 class="heading">MY  CART</h1>
        <table>
            <?php 
            $select_cart_products =mysqli_query($conn,"select * from  `cart`") ;
            $num =1 ;
            $grand_total =0 ;
            if(mysqli_num_rows($select_cart_products)>0)
            {  echo"      <thead>
                <th>sl no</th>
                <th>Product Name</th>
                <th>Product image</th>
                <th>Product Price</th>
                <th>Product quantity</th>
                <th>Total Price</th>
                <th>action</th>
            </thead>
            <tbody>" ;
            while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products))
            {
                ?>
                    <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $fetch_cart_products['name'] ?></td>
                <td><img src="images/<?php echo $fetch_cart_products['image'] ?>" alt="cloud"></td>
                <td>$<?php echo $fetch_cart_products['price'] ?>/-</td>
                <td> 
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fetch_cart_products['id'] ?>" name="update_quantity_id">
                <div class="quantity_box">
                    <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity'] ?>" name="update_quantity">
                    <input type="submit" min="1" class="update_quantity" value="update" name="update_product_quantity">
                  </div>
             </form>
                </td>
                <td>$<?php echo $subtotal =number_format( $fetch_cart_products['price']* $fetch_cart_products['quantity']); ?>/-</td>
                <td><a href="/cart.php?remove=<?php echo $fetch_cart_products['id'] ?>"
                 onclick="return confirm('Are you sure you want delete this Item')">
                    <i class="fas fa-trash"></i>Remove
                </a></td>
                </tr>
                <?php
                $grand_total +=$grand_total+( $fetch_cart_products['price'] * $fetch_cart_products['quantity']);
            
               $num++ ;
            }
            }
            else{
                echo"<div class ='empty_text'>Cart is Empty</div> " ;
            }
            ?>
      
           
            
            </tbody>
        </table>
<!-- php query -->
 <!-- bottom area -->

<?php
if($grand_total>0)
{  echo"<div class='table_bottom'>
    <a href='shop+products.php' class='bottom_btn'>continue shopping</a>
    <h3 class='bottom_btn'>Grand total :$<span> echo $grand_total /-</span></h3>
    <a href='checkout.php' class=bottom_btn'>procced to checkout</a>
</div>" ;



?>
       
        
        <a href="/cart.php?delete_all" class="delete_all_btn">
            <i class="fas fa-trash"></i> Delete All </a>
        </a>
       <?php
}
else {
   echo"" ;
}
?>
    </section>
</div>

</body>
</html>