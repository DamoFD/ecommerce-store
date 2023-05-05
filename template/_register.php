<?php
    // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['register_submit'])){
      // call method registerUser
      $Register->registerUser($_POST);
    }
  }
?>

<!-- register section -->
<section id="register">
    <h1 class="font-mont font-size-xl color-primary">Register</h1>
    <p>Have an account? <a href="#">Login</a></p>

    <!-- Register Form -->
    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
        <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" name="firstName" id="firstName" placeholder="First Name" required>
        <input type="text" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" name="lastName" id="lastName" placeholder="Last Name" required>
        <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" placeholder="Email" id="email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" required>
        <small id="confirm_error"></small>
        <input type="checkbox" name="agreement" id="agreement" required>
        <label for="agreement">I agree to the <a href="#">terms, conditions, and policy</a> (*)</label>
        <button name="register_submit" type="submit">Register</button>
    </form>
    <!-- !Register Form -->
</section>
<!-- !register section -->