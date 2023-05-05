<!--Featured-->

<?php
  shuffle($product_shuffle);

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['featured_submit'])){
      if(isset($currentUser['user_id'])){
      // call method addToCart
      $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
      }else{
        header("Location: login.php");
        exit();
      }
    }
  }
?>


<section id="featured">
        <div>
          <h2 class="font-mont font-size-xl color-primary">Featured</h2>
          <!--Owl Carousel-->
          <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item) { ?>
            <div class="item">
              <div class="product font-roboto">
                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"
                  ><img src="<?php echo $item['item_image'] ?? "./assets/products/dress-shirt.jpg"; ?>" alt="product1"
                /></a>
                <div class="product-info">
                  <h3 class="font-size-lg color-primary"><?php echo $item['item_name'] ?? "Unknown"; ?></h3>
                  <div class="font-size-20 color-primary">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <div>
                    <span class="font-size-20 color-primary">$<?php echo $item['item_price'] ?? '0'; ?></span>
                  </div>
                  <form method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $currentUser['user_id'] ?? '0'; ?>">
                    <?php
                      if(isset($currentUser) && array_key_exists('user_id', $currentUser) && in_array($item['item_id'],$Cart->getCartId($Cart->getCartData($currentUser['user_id'])) ?? [])){
                        echo '<button
                        type="submit"
                        disabled
                        class="font-size-20 product-btn color-secondary-bg"
                      >
                        Added to Cart
                      </button>';
                      }else{
                        echo '<button
                        type="submit"
                        name="featured_submit"
                        class="font-size-20 product-btn color-primary-bg"
                      >
                        Add to Cart
                      </button>';
                      }
                    ?>
                  </form>
                </div>
              </div>
            </div>
            <?php } //closing foreach function ?>
          </div>
          <!--!Owl Carousel-->
        </div>
      </section>
      <!--!Featured-->