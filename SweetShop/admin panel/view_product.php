<?php
include '../components/connect.php';

if(isset($_COOKIE['seller_id'])){
    $seller_id=$_COOKIE['seller_id'];
}else{
    $seller_id='';
    header('location: login.php');
    exit; // Add an exit after header redirect
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Unnamed Sweet Shop - show products page </title>
  <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
  
  <div class="main-container">
    <?php include '../components/admin_header.php';       ?>
    <section class="show-post">
        <div class="heading">
            <h1>Your Products</h1>
            <!-- image for a logo of some sorts -->
            <img src="../image/" alt="An image here" >
        </div>
        <div class="box-container">
            <?php
                $select_products = $conn->prepare("SELECT * FROM products WHERE seller_id = ?");
                $select_products->execute([$seller_id]);
                if($select_products->rowCount() > 0) {
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?> 
            
            <form action="" method="post" class="box">
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                <?php if($fetch_products['image'] != '') { ?>
                    <img src="../uploaded_files/<?= $fetch_products['image']; ?>" alt="Product Image"/>
                <?php } ?>
                <div class="status" style="color: <?php echo ($fetch_products['status'] == 'active') ? 'green' : 'red'; ?>">
                    <?= $fetch_products['status']; ?>
                </div>
            </form>
            
            <?php
                } // closing while loop
                } else { // No products found
                    echo '
                        <div class="empty">
                            <p>No products added yet! <br> <a href="add_product.php" class="btn" style="margin-top: 1.5rem">Add products now.</a></p>
                        </div>
                    ';
                } // closing if-else block
            ?>
        </div>
    </section>
  </div>
  

  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- custom js link -->
  <script src="../js/script.js"></script>

  <?php include '../components/alert.php';       ?>

</body>
</html>
