<?php

    //require MySQL Connection
    require('database/DBController.php');

    //require Product Class
    require('database/Product.php');

    //require Cart Class
    require('database/Cart.php');

    //require User Class
    require('database/User.php');

    //DBController Object
    $db = new DBController();

    //Product Object
    $product = new Product($db);
    $product_shuffle = $product->getData();

    //Cart Object
    $Cart = new Cart($db);

    //User Object
    $User = new User($db);
?>