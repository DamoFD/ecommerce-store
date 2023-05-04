<?php

    require ('helper.php');

    // error variable
    $error = array();

    $firstName = validate_input_text($_POST['firstName']);
    if(empty($firstName)){
        $error[] = "Please enter your first name";
    }

    $lastName = validate_input_text($_POST['lastName']);
    if(empty($lastName)){
        $error[] = "Please enter your last name";
    }

    $email = validate_input_email($_POST['email']);
    if(empty($email)){
        $error[] = "Please enter your email";
    }

    $password = validate_input_text($_POST['password']);
    if(empty($password)){
        $error[] = "Please enter a password";
    }

    $confirm_pwd = validate_input_text($_POST['confirm_pwd']);
    if(empty($confirm_pwd)){
        $error[] = "Please confirm your password";
    }

    if(empty($error)){
        echo 'validate';
    }else{
        echo 'not validate';
    }


?>