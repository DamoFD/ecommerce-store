<?php

    //require MySQL Connection
    require('database/DBController.php');

    //require Product Class
    require('database/Product.php');

    //DBController Object
    $db = new DBController();

    //Product Object
    $product = new Product($db);

?>