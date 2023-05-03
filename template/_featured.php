<!--Featured-->

<?php
  $product_shuffle = $product->getData();
  shuffle($product_shuffle);
?>


<section id="featured">
        <div>
          <h2 class="font-mont font-size-xl color-primary">Featured</h2>
          <!--Owl Carousel-->
          <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item) { ?>
            <div class="item">
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
                    <span class="font-size-20 color-primary">$<?php echo $item['item_price'] ?? '0'; ?></span>
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
            <?php } //closing foreach function ?>
          </div>
          <!--!Owl Carousel-->
        </div>
      </section>
      <!--!Featured-->