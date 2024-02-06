<header>
  <div class="logo">
    <img src="../image/logo3.jpg" width="150">
  </div>
  <div class="right">
    <div class="fa-solid fa-user" id="user-btn"></div>
    <div class="toggle-btn"><i class="fa-solid fa-book"></i></div>
  </div>
  <div class="profile-detail">
    <?php
      $select_profile=$conn->prepare("SELECT * FROM `sellers` WHERE id= ?");
      $select_profile->execute([$seller_id]);

      if($select_profile->rowCount()>0){
        $fetch_profile=$select_profile->fetch(PDO::FETCH_ASSOC);
      }
    ?>
    <div class="profile">
      <img src="../uploaded_files/<?=$fetch_profile['image'];?>" class="logo-img" width="100">
      <p><?= $fetch_profile['name']; ?></p>
      <div class="flex-btn">
        <a href="profile.php" class="btn">Profile</a>
        <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="btn">Logout</a>
        <a href="profile.php" class="btn">Profile</a>
      </div>
    </div>
    <?php  ?>
  </div>
</header>
<div class="sidebar-container">
  <div class="sidebar">
  <?php
      $select_profile=$conn->prepare("SELECT * FROM `sellers` WHERE id= ?");
      $select_profile->execute([$seller_id]);

      if($select_profile->rowCount()>0){
        $fetch_profile=$select_profile->fetch(PDO::FETCH_ASSOC);
      }
    ?>
    <div class="profile">
      <img src="../uploaded_files/<?=$fetch_profile['image'];?>" class="logo-img" width="100">
      <p><?= $fetch_profile['name']; ?></p>
    </div>
    <?php  ?>
    <h5>Menu</h5>
    <div class="navbar">
      <ul>
        <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
        <li><a href="add_product.php"><i class="fa-solid fa-cart-shopping"></i>Add Product</a></li>
        <li><a href="view_product.php"><i class="fa-solid fa-book"></i>View Product</a></li>
        <li><a href="user_accounts.php"><i class="fa-solid fa-user"></i>Accounts</a></li>
        <li><a href="../components/admin_logout.php"onclick="return confirm('Logout from this Website');"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
      </ul>
    </div>
    <h5>Find us</h5>
    <div class="social-links">
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-linkedin"></i>
      <i class="fa-brands fa-twitter"></i>
      <i class="fa-brands fa-pinterest"></i>
    </div>
  </div>
</div>