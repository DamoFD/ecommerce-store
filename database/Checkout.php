<?php

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
        "line_items" => [
            [
                "price_data" => [
                    "currency" =>"usd",
                    "product_data" =>[
                        "name" => "Mobile",
                        "description" => "Lorem ipsum"
                    ],
                    "unit_amount" => 5000
                ],
                "quantity" => 1
            ],

            [
                "price_data" => [
                    "currency" => "usd",
                    "product_data" => [
                        "name" => "Shirt",
                        "description" => "ipsum lorem"
                    ],
                    "unit_amount" => 2000
                ],
                "quantity" => 2
            ]
        ]
    ]);

    echo json_encode($session);
?>