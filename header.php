<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Luxe Style Society</title>

  <!--Owl-carousel-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Animate-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Font-Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Custom CSS File-->
  <link rel="stylesheet" href="./style.css" />

  <?php
  //require functions.php file
  require('functions.php');
  ?>


</head>

<body>
  <!--start #header-->
  <header id="header" class="header__main">
    <!--Primary Navigation-->
    <nav class="navbar">
      <a href="index.php" rel="home"><img src="./assets/lss-logo-white.png" class="header-img" /></a>
      <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <ul class="nav no-search font-roboto">
        <li class="nav-item"><a href="#">On Sale</a></li>
        <li class="nav-item"><a href="#">Category</a></li>
        <li class="nav-item">
          <a href="#">Products<i class="fas fa-chevron-down"></i></a>
        </li>
        <li class="nav-item"><a href="#">Blog</a></li>
        <li class="nav-item">
          <a href="#">Category<i class="fas fa-chevron-down"></i></a>
        </li>
        <li class="nav-item"><a href="#">Coming Soon</a></li>
        <li class="nav-item nav-right"><a href="#">Login</a></li>
        <li class="nav-item nav-right"><a href="wishlist.php">Wishlist</a></li>
        <li class="nav-item nav-right">
          <form action="#">
            <a href="cart.php"><i class="fas fa-shopping-cart"><span><?php echo count($product->getData('cart')); ?></span></i></a>
          </form>
        </li>
      </ul>
    </nav>
    <!--!Primary Navigation-->
  </header>
  <!--!start #header-->

  <!--start #main-->
  <main id="main-site">