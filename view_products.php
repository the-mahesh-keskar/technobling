<!-- add data base -->
<?php include 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view product -project</title>

    <link rel="stylesheet" href="/shopping1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
   
   </style>
</head>
<body>
<?php
include 'header5.php' 
?>
<!-- cantianor -->
<div class="container">
    <section class="display_product">


        <?php
        $display_product =mysqli_query($conn,"select * from `products`");
        $num =1 ;
        if(mysqli_num_rows($display_product)>0)
        {   echo "   <table>
            <thead>
                <th>Sl.NO</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </thead>
            <tbody>" ;

         while($row =mysqli_fetch_assoc($display_product))
         { 
            ?>

            <!--dispaly table -->
  
     <tr>
        <td><?php echo $num ?></td>
        <td><img src="images/<?php echo $row['image'] ?>" alt=<?php echo $row['name'] ?>></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td>
       
        <a  href="delete.php?delete=<?php echo $row['id'] ?>" class="delete_product_btn" onclick="return confirm('are you sure you to delete this product');" ><i class="fas fa-trash"></i></a>
       
        <a href="update.php?edit=<?php echo $row['id'] ?>" class ="update_product_btn "  class="fas fa-edit">
            <i class="fas fa-edit"></i></a>
     </td>
    </tr>
        <?php
        $num++ ;       
         }
        }
        else{
              echo " <div class ='empty_text'>No products avalable </div> " ;

        }
        ?>
        
        
            <!--<a href="" class="delete_product_btn"><i class="fas fa-trash"></i></a>
            <a href=""class ="update_product_btn "><i class="fas fa-edit"></i></a>
    -->
        </td>
        
    </tbody>
    
</table>
    </section>
</div>
</body>
</html>