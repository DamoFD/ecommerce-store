<?php


require ('./functions.php');

try {
    $cartData = $Cart->getCartData($currentUser['user_id']);

    $line_items = [];

    foreach($cartData as $item){
        $line_items[] = [
            "price_data" => [
                "currency" => "usd",
                "product_data" => [
                    "name" => $item['item_name'],
                    "description" => $item['color'] . " | " . $item['size']
                ],
                "unit_amount" => $item['item_price'] * 100
            ],
            "quantity" => $item['quantity']
        ];
    }

    // Stripe Payments
    require './vendor/autoload.php';
    require_once './config/stripe_config.php';
    header('Content-Type: application/json');

    $stripe = new Stripe\StripeClient(STRIPE_SECRET_KEY);
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://localhost/ecommerce-site/confirmation.php",
        "cancel_url" => "http://localhost/ecommerce-site/declined.php",
        "payment_method_types" => ['card'],
        "mode" => "payment",
        "line_items" => $line_items
    ]);

    echo json_encode($session);

} catch (Exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(array('error' => 'A server error ocurred. Please try again later.'));
}
?>