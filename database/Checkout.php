<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require ('../functions.php');

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
    require '../vendor/autoload.php';
    require_once '../config/stripe_config.php';
    header('Content-Type: application/json');

    $stripe = new Stripe\StripeClient(STRIPE_SECRET_KEY);
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://localhost/ecommerce-site/success.php",
        "cancel_url" => "http://localhost/ecommerce-site/cancel.php",
        "payment_method_types" => ['card'],
        "mode" => "payment",
        "line_items" => $line_items
    ]);

    echo json_encode($session);
?>