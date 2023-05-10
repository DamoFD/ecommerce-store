<!--Featured Categories-->

<?php
  $category = array_map(function($pro){ return $pro['item_category'];}, $product_shuffle);
  $unique = array_unique($category);
  sort($unique);
  shuffle($product_shuffle);

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['featured_categories_submit'])){
      if(isset($currentUser['user_id'])){
      // call method addToCart
      $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
      }else{
        header("Location: login.php");
        exit();
      }
    }
  }

  $in_cart = isset($currentUser) && array_key_exists('user_id', $currentUser) ? $Cart->getCartId($Cart->getCartData($currentUser['user_id'])) : [];
?>

<section id="featured-categories">
        <div class="featured-categories__btn-container">
          <h2 class="font-size-xl font-mont color-primary">
            Categories
          </h2>
          <div id="filters" class="button-group font-size-16">
            <button
              class="btn is-checked color-primary-bg font-size-16 font-roboto"
              data-filter="*"
            >
              All
            </button>
            
            <?php
              array_map(function($category){
                printf('<button
                class="btn color-primary-bg font-size-16 font-roboto"
                data-filter=".%s"
              >
                %s
              </button>',$category,$category);
              },$unique);
            ?>

          </div>
        </div>

        <div class="grid">
          <?php array_map(function($item) use($in_cart){ ?>
          <div class="grid-item <?php echo $item['item_category'] ?? "category"; ?>">
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
                  <span class="font-size-20 color-primary">$<?php echo $item['item_price'] ?? "0"; ?></span>
                </div>
                <form method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $currentUser['user_id'] ?? '0'; ?>">
                    <?php
                      if(in_array($item['item_id'],$in_cart ?? [])){
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
                        name="featured_categories_submit"
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
          <?php },$product_shuffle) ?>
        </div>
      </section>
      <!--!Featured Categories-->