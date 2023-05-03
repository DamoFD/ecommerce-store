<!--Featured Categories-->
<section id="featured-categories">
        <div class="featured-categories__btn-container">
          <h2 class="font-size-xl font-mont color-primary">
            Featured Categories
          </h2>
          <div id="filters" class="button-group font-size-16">
            <button
              class="btn is-checked color-primary-bg font-size-16 font-roboto"
              data-filter="*"
            >
              All
            </button>
            <button
              class="btn color-primary-bg font-size-16 font-roboto"
              data-filter=".men"
            >
              Men's
            </button>
            <button
              class="btn color-primary-bg font-size-16 font-roboto"
              data-filter=".women"
            >
              Women's
            </button>
          </div>
        </div>

        <div class="grid">
          <?php array_map(function($item){ ?>
          <div class="grid-item <?php echo $item['item_category'] ?? "category"; ?>">
            <div class="product font-roboto">
              <a href="#"
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
                  <span class="font-size-20 color-primary"><?php echo $item['item_price'] ?? "0"; ?></span>
                </div>
                <button
                  type="submit"
                  class="font-size-20 product-btn color-primary-bg"
                >
                  Add to Cart
                </button>
              </div>
            </div>
          </div>
          <?php },$product_shuffle) ?>
        </div>
      </section>
      <!--!Featured Categories-->