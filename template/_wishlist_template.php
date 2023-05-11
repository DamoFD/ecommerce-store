<!--Shopping cart section-->

<?php

// delete wishlist item
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['remove-wish-submit'])){
      $deletedrecord = $Cart->deleteWish($_POST['item_id']);
    }

    if(isset($_POST['cart-submit'])){
        $Cart->saveForLater($_POST['item_id'],'cart','wishlist');
    }
}

?>

<section id="cart">
    <div>
        <h1 class="font-mont font-size-xl color-primary">Wishlist</h1>

        <!--shopping cart items-->
        <div class="container">
            <div class="items">
                <?php
                if (!empty ($currentUser)) {
                $wishlistData = $Cart->getWishlistData($currentUser['user_id']);
                if (!empty($wishlistData)) {
                    foreach ($wishlistData as $item) :
                ?>
                            <!--cart item-->
                            <div class="item">
                                <div class="col">
                                <img
                    src="<?php echo $item['item_image'] ?? "./assets/products/dress-shirt.webp"; ?>"
                    srcset="<?php echo $item['item_image_mobile'] ?? "./assets/products/dress-shirt-mobile.webp"; ?> 600w, <?php echo $item['item_image'] ?? "./assets/products/dress-shirt.webp"; ?>"
                    sizes="(max-width: 600px) 100vw"
                    loading="lazy"
                    alt="<?php echo $item['item_name'] ?? 'product'; ?>"
                />
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
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                            <button type="submit" name="cart-submit" class="font-roboto btn font-size-20 color-primary">
                                                Add to Cart
                                            </button>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                            <button type="submit" name="remove-wish-submit" class="font-roboto btn font-size-20 color-primary">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                    <!--!product qty-->
                                </div>
                                <div class="col">
                                    <div class="font-size-lg font-roboto">
                                        $<span data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="product_price"><?php echo $item['item_price'] ?? "0"; ?></span>
                                    </div>
                                </div>
                            </div>
                            <!--!cart item-->
                            <?php
            endforeach;
          } else {
            echo '<p class="font-roboto font-size-20 color-primary empty-txt">Your wishlist is empty</p>';
          }
        } else {
          echo '<p class="font-robot font-size-20 color-primary empty-txt">Please log in to view your wishlist</p>';
        }
        ?>
            </div>
        </div>
        <!--!shopping cart items-->
    </div>
</section>
<!--!Shopping cart section-->