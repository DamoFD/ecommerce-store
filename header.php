<?php
  //require functions.php file
  require('functions.php');
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Welcome to Luxe Style Society! This is an ecommerce template by Damion Voshall." />
  <title>Luxe Style Society</title>

  <!--Owl-carousel-->
  <link rel="preload" as="style" onload="this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preload" as="style" onload="this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Animate-->
  <link rel="preload" as="style" onload="this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Font-Awesome-->
  <link rel="preload" as="style" onload="this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Custom CSS File-->
  <link rel="stylesheet" href="./style.css" />


</head>

<body>
  <!--start #header-->
  <header id="header" class="header__main">
    <!--Primary Navigation-->
    <nav class="navbar">
      <a href="index.php" rel="home" aria-label="Home"><img src="./assets/lss-logo-white.webp" class="header-img" alt="Luxe Society Logo" /></a>
      <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <ul class="nav no-search font-roboto">
        <li class="nav-item"><a href="featured.php">Featured</a></li>
        <li class="nav-item"><a href="categories.php">Categories</a></li>
        <li class="nav-item"><a href="new-arrivals.php">New Arrivals</a></li>
        <li class="nav-item"><a href="#">Blog</a></li>
        <li class="nav-item nav-right"><a href="wishlist.php">Wishlist</a></li>
        <li class="nav-item nav-right">
          <form action="#">
            <a href="cart.php"><i class="fas fa-shopping-cart"><span><?php echo isset($currentUser) && array_key_exists('user_id', $currentUser) ? count($Cart->getCartData($currentUser['user_id'])) : 0; ?></span></i></a>
          </form>
        </li>
        <li class="nav-item nav-right">
          <?php if(isset($currentUser) && array_key_exists('user_id', $currentUser)): ?>
            <a href="logout.php">Welcome <?php echo $currentUser['first_name'] ?> | Logout</a>
            <?php else: ?>
          <a href="login.php">Login</a></li>
          <?php endif; ?>
      </ul>
    </nav>
    <!--!Primary Navigation-->
  </header>
  <!--!start #header-->

  <!--start #main-->
  <main id="main-site">