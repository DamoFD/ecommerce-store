<!--Featured Categories-->

<?php
  $category = array_map(function($pro){ return $pro['item_category'];}, $product_shuffle);
  $unique = array_unique($category);
  sort($unique);
  shuffle($product_shuffle);

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
                ><img
                    src="<?php echo $item['item_image'] ?? "./assets/products/dress-shirt.webp"; ?>"
                    srcset="<?php echo $item['item_image_mobile'] ?? "./assets/products/dress-shirt-mobile.webp"; ?> 600w, <?php echo $item['item_image'] ?? "./assets/products/dress-shirt.webp"; ?>"
                    sizes="(max-width: 600px) 100vw"
                    loading="lazy"
                    alt="<?php echo $item['item_name'] ?? 'product'; ?>"
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
                <div>
                    <?php
                      if(in_array($item['item_id'],$in_cart ?? [])): ?>
                        <a
                        href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"
                        class="font-size-20 product-btn color-secondary-bg"
                      >
                        Added to Cart
                      </a>
                      <?php else: ?>
                        <a
                        href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"
                        name="featured_categories_submit"
                        class="font-size-20 product-btn color-primary-bg"
                      >
                        View
                      </a>
                      <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <?php },$product_shuffle) ?>
        </div>
      </section>
      <!--!Featured Categories-->