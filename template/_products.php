<!--Product-->

<?php

$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item) :
  if ($item['item_id'] == $item_id) :

    // request method post
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (isset($_POST['product_submit'])) {
        if (isset($currentUser['user_id'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $_POST['color'], $_POST['size'], $_POST['quantity']);
        }else{
          header('Location: login.php');
          exit();
        }
      }
    }

?>

    <section id="product">
      <div>
        <div class="row">
          <div class="col">
            <img src="<?php echo $item['item_image'] ?? "./assets/products/dress-shirt.jpg"; ?>" alt="product1" />
          </div>
          <div class="col">
            <h1 class="font-mont font-size-xl color-primary"><?php echo $item['item_name'] ?? "Unknown"; ?></h1>
            <div class="product-ratings">
              <div class="font-size-20 color-primary">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <a href="#" class="font-roboto font-size-20 color-primary">20,534 ratings | 1000+ answered questions</a>
            </div>

            <!--Product Price-->
            <div class="pricing font-roboto font-size-lg color-primary">
              <p><strike>$162.00</strike></p>
              <p class="price">$<span><?php echo $item['item_price'] ?? '0'; ?></span></p>
              <p class="discount">30% off</p>
            </div>
            <!--!Product Price-->

            <div class="col">
              <!--color-->
              <div class="color">
                <p class="font-roboto font-size-20 color-text">Color: Yellow</p>
                <div class="color-btns">
                  <button class="color-yellow-bg active-border" data-color-name="Yellow"></button>
                  <button class="color-primary-bg" data-color-name="Black"></button>
                  <button class="color-secondary-bg" data-color-name="Blue"></button>
                </div>
              </div>
              <!--!color-->
            </div>
            <!--size-->
            <div class="size">
              <p class="font-roboto font-size-20 color-primary size-text">Size: M</p>
              <div class="size-btns">
                <button class="font-size-20 font-roboto" data-size="S">S</button>
                <button class="font-size-20 font-roboto active-background" data-size="M">M</button>
                <button class="font-size-20 font-roboto" data-size="L">L</button>
                <button class="font-size-20 font-roboto" data-size="XL">XL</button>
              </div>
            </div>
            <div class="purchase-btns">
              <!--product qty section-->
              <div class="p-qty">
                <p class="font-roboto font-size-20">Qty:</p>
                <div class="font-roboto">
                  <button data-id="pro1" class="p-qty-down font-size-20 color-primary-bg">
                    <i class="fa-solid fa-minus"></i>
                  </button>
                  <input data-id="pro1" type="text" class="p-qty-input font-size-20 color-primary" disabled value="1" placeholder="1" />
                  <button data-id="pro1" class="p-qty-up font-size-20 color-primary-bg">
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>
              </div>
              <!--!product qty section-->
                <button class="font-size-20 font-roboto color-primary-bg" type="submit">
                  Buy Now
                </button>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                <input type="hidden" name="user_id" value="<?php echo $currentUser['user_id'] ?? '0'; ?>">
                <input type="hidden" name="color" id="color_input" value="Yellow">
                <input type="hidden" name="size" id="size_input" value="M">
                <input type="hidden" name="quantity" id="quantity_input" value="1">
                <?php
                if (isset($currentUser) && array_key_exists('user_id', $currentUser) && in_array($item['item_id'], $Cart->getCartId($Cart->getCartData($currentUser['user_id'])) ?? [])) {
                  echo '<button
                        type="submit"
                        disabled
                        class="font-size-20 font-roboto color-primary-bg"
                      >
                        Added to Cart
                      </button>';
                } else {
                  echo '<button
                        type="submit"
                        name="product_submit"
                        class="font-size-20 font-roboto color-primary-bg"
                      >
                        Add to Cart
                      </button>';
                }
                ?>
              </form>
            </div>
            <!--!size-->
          </div>
        </div>
        <div class="product-description">
          <h2 class="font-mont font-size-xl color-primary">About The Product</h2>
          <p class="font-roboto font-size-lg color-primary">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
            soluta omnis voluptates nulla neque corporis explicabo quasi
            minima blanditiis! Error.
          </p>
          <p class="font-roboto font-size-lg color-primary">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
            soluta omnis voluptates nulla neque corporis explicabo quasi
            minima blanditiis! Error.
          </p>
        </div>
      </div>
    </section>
    <!--!Product-->

<?php

  endif;
endforeach;

?>