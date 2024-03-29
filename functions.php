<?php session_start();

    //require MySQL Connection
    require('database/DBController.php');

    //require Product Class
    require('database/Product.php');

    //require Cart Class
    require('database/Cart.php');

    //require Register Class
    require('database/Register.php');

    //require Login Class
    require ('database/Login.php');

    //require User Class
    require ('database/User.php');

    //require Cache Class
    require ('database/Cache.php');

    //DBController Object
    $db = new DBController();

    //Cache Object
    $Cache = new Cache();

    //Product Object
    $product = new Product($db, $Cache);
    $product_shuffle = $product->getData();

    //Cart Object
    $Cart = new Cart($db);

    //Register Object
    $Register = new Register($db);

    //Login Object
    $Login = new Login($db);

    //User Object
    $User = new User($db);

    //Get Current User
    $currentUser = array();
    if(isset($_SESSION['user_id'])){
        $currentUser = $User->getUserInfo($_SESSION['user_id']);
    }
?>