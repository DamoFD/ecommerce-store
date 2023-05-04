<!--Shopping cart section-->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
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
                $wishlistData = $product->getData('wishlist');
                if (!empty($wishlistData)) {
                    foreach ($product->getData('wishlist') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item) {
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
                                            <button type="submit" name="remove-cart-submit" class="font-roboto btn font-size-20 color-primary">
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
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                } else {
                    echo '<p class="font-roboto font-size-20 color-primary">Your wishlist is empty</p>';
                }
                ?>
            </div>
        </div>
        <!--!shopping cart items-->
    </div>
</section>
<!--!Shopping cart section-->