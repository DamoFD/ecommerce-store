<!--Shopping cart section-->
<section id="cart">
        <div>
          <h1 class="font-mont font-size-xl color-primary">Shopping Cart</h1>

          <!--shopping cart items-->
          <div class="container">
            <div class="items">
              <?php
                foreach($product->getData('cart') as $item) :
                  $cart = $product->getProduct($item['item_id']);
                  $subTotal[] = array_map(function($item){
              ?>
              <!--cart item-->
              <div class="item">
                <div class="col">
                  <img src="<?php echo $item['item_image'] ?? "./assets/products/dress-shirt.jpg"; ?>" alt="cart1" />
                </div>
                <div class="col">
                  <div class="product-info">
                    <h2 class="font-rale font-size-lg color-primary">
                      <?php echo $item['item_name'] ?? "Unknown" ?>
                    </h2>
                    <p class="font-roboto font-size-16 color-primary">
                      Pearl White | M
                    </p>
                    <!--product rating-->
                    <div>
                      <div class="font-size-20 color-primary">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <a href="#" class="font-roboto font-size-20 color-primary"
                        >20,534 ratings</a
                      >
                    </div>
                  </div>
                  <!--!product rating-->

                  <!--product qty-->
                  <div class="qty">
                    <div class="font-roboto">
                      <button
                        class="qty-down font-size-20 color-primary"
                        data-id="pro1"
                      >
                        <i class="fa-solid fa-minus"></i>
                      </button>
                      <input
                        data-id="pro1"
                        type="text"
                        class="qty-input color-primary font-roboto font-size-20"
                        disabled
                        value="1"
                        placeholder="1"
                      />
                      <button
                        class="qty-up font-size-20 color-primary"
                        data-id="pro1"
                      >
                        <i class="fa-solid fa-plus"></i>
                      </button>
                    </div>
                    <button
                      type="submit"
                      class="font-roboto btn font-size-20 color-primary"
                    >
                      Save for Later
                    </button>
                    <button
                      type="submit"
                      class="font-roboto btn font-size-20 color-primary"
                    >
                      Remove
                    </button>
                  </div>
                  <!--!product qty-->
                </div>
                <div class="col">
                  <div class="font-size-lg font-roboto">
                    $<span class="product__price"><?php echo $item['item_price'] ?? "0"; ?></span>
                  </div>
                </div>
              </div>
              <!--!cart item-->
              <?php
                return $item['item_price'];
                },$cart); // closing array_map function
                endforeach;
              ?>
            </div>
            <!--Subtotal Section-->
            <div class="col">
              <div class="sub-total">
                <p class="font-size-20 font-roboto color-primary">
                  <i class="fa fa-check"></i>Your order is eligible for FREE
                  delivery
                </p>
                <h2 class="font-mont font-size-lg color-primary">
                  Subtotal (<?php echo count($product->getData('cart')); ?> items)
                </h2>
                <h3 class="font-mont font-size-lg color-primary">
                <span>
                    $
                    <span id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span>
                  </span>
                </h3>
                <button
                  type="submit"
                  class="font-size-20 color-primary-bg font-roboto checkout-btn"
                >
                  Proceed to Checkout
                </button>
              </div>
            </div>
            <!--!Subtotal Section-->
          </div>
          <!--!shopping cart items-->
        </div>
      </section>
      <!--!Shopping cart section-->