<?php

    // require MySQL Connection
    require ('../database/DBController.php');

    // require Product Class
    require ('../database/Product.php');

    // require User Class
    require ('../database/User.php');

    // require Cart Class
    require ('../database/Cart.php');

    // DBController object
    $db = new DBController();

    // Product object
    $product = new Product($db);

    // User object
    $user = new User($db);

    // Cart object
    $cart = new Cart($db);

    if(isset($_POST['itemid']) && isset($_POST['userid']) && isset($_POST['new_quantity'])){
        $userId = $_POST['userid'];
        $itemId = $_POST['itemid'];
        $newQuantity = $_POST['new_quantity'];

        // Update Quantity in Database
        $cart->updateCartQuantity($userId, $itemId, $newQuantity);

        // Get Product By itemid
        $result = $product->getProduct($_POST['itemid']);
        echo json_encode($result);
        exit();
    }

?>