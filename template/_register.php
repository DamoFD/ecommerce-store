<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require ('./register/register-process.php');
    }
?>

<!-- register section -->
<section id="register">
    <h1 class="font-mont font-size-xl color-primary">Register</h1>
    <p>Have an account? <a href="#">Login</a></p>

    <!-- Register Form -->
    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
        <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <input type="password" name="pasword" id="password" placeholder="Password" required>
        <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" required>
        <small id="confirm_error"></small>
        <input type="checkbox" name="agreement" id="agreement" required>
        <label for="agreement">I agree to the <a href="#">terms, conditions, and policy</a> (*)</label>
        <button type="submit">Register</button>
    </form>
    <!-- !Register Form -->
</section>
<!-- !register section -->