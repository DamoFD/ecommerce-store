<!--Shopping cart section-->

<?php

// delete cart item
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['remove-cart-submit'])) {
    $deletedrecord = $Cart->deleteCart($_POST['item_id']);
  }

  // save for later
  if (isset($_POST['wishlist-submit'])) {
    $Cart->saveForLater($_POST['item_id']);
  }
}

?>

<section id="cart">
  <div>
    <h1 class="font-mont font-size-xl color-primary">Shopping Cart</h1>

    <!--shopping cart items-->
    <div class="container">
      <div class="items">
        <?php
        if (!empty($currentUser)) {
          $cartData = $Cart->getCartData($currentUser['user_id']);
          if (!empty($cartData)) {
            $subTotal = 0;
            foreach ($cartData as $item) :
              $subTotal += $item['item_price'] * $item['quantity'];
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
                      <?php echo $item['color'] . ' | ' . $item['size'] ?? 'Pearl White | M'; ?>
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
                      <a href="#" class="font-roboto font-size-20 color-primary">20,534 ratings</a>
                    </div>
                  </div>
                  <!--!product rating-->

                  <!--product qty-->
                  <div class="qty">
                    <div class="font-roboto">
                      <button class="qty-down font-size-20 color-primary" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                        <i class="fa-solid fa-minus"></i>
                      </button>
                      <input data-id="<?php echo $item['item_id'] ?? '0'; ?>" type="text" class="qty-input color-primary font-roboto font-size-20" disabled value="<?php echo $item['quantity'] ?? '5'; ?>" placeholder="1" />
                      <button class="qty-up font-size-20 color-primary" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                        <i class="fa-solid fa-plus"></i>
                      </button>
                    </div>
                    <form method="post">
                      <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                      <button type="submit" name="wishlist-submit" class="font-roboto btn font-size-20 color-primary">
                        Add to Wishlist
                      </button>
                    </form>
                    <form method="post">
                      <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                      <button type="submit" name="remove-cart-submit" class="font-roboto btn font-size-20 color-primary">
                        Remove
                      </button>
                    </form>
                  </div>
                  <!--!product qty-->
                </div>
                <div class="col">
                  <div class="font-size-lg font-roboto">
                    $<span data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="product_price"><?php echo $item['item_price'] * $item['quantity'] ?? "0"; ?></span>
                  </div>
                </div>
              </div>
              <!--!cart item-->
        <?php
            endforeach;
          } else {
            echo '<p class="font-roboto font-size-20 color-primary">Your shopping cart is empty</p>';
          }
        } else {
          echo '<p class="font-robot font-size-20 color-primary">Please log in to view your cart</p>';
        }
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
            Subtotal (<?php echo isset($cartData) ? count($product->getData('cart')) : 0; ?> items)
          </h2>
          <h3 class="font-mont font-size-lg color-primary">
            <span>
              $
              <span id="deal-price"><?php echo $subTotal ?></span>
            </span>
          </h3>
          <button id="stripe-btn" type="submit" class="font-size-20 color-primary-bg font-roboto checkout-btn">
            Checkout With Stripe
          </button>
        </div>
      </div>
      <!--!Subtotal Section-->
    </div>
    <!--!shopping cart items-->
  </div>
</section>
<!--!Shopping cart section-->