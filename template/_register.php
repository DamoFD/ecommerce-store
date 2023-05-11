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
    <p class="font-roboto font-size-20 header-txt">Have an account? <a href="login.php">Login</a></p>

    <!-- Register Form -->
    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
      <div class="name-inputs">
        <input
          type="text"
          value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"
          name="firstName"
          id="firstName"
          placeholder="First Name*"
          class="input-firstName font-roboto font-size-20 color-primary"
          required
        >
        <input
          type="text"
          value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" 
          name="lastName"
          id="lastName"
          placeholder="Last Name*"
          class="input-lastName font-roboto font-size-20 color-primary"
          required
        >
      </div>
        <input
          type="email"
          value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"
          name="email"
          placeholder="Email*"
          id="email"
          class="auth-input font-roboto font-size-20 color-primary"
          required
        >
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Password*"
          class="auth-input font-roboto font-size-20 color-primary"
          required
        >
        <input
          type="password"
          name="confirm_pwd"
          id="confirm_pwd"
          placeholder="Confirm Password*"
          class="auth-input font-roboto font-size-20 color-primary"
          required
        >
        <small id="confirm_error"></small>
        <div class="agreement-container">
          <input class="agreement-checkBox" type="checkbox" name="agreement" id="agreement" required>
          <label class="font-roboto font-size-16 color-primary" for="agreement">I agree to the <a href="#">terms, conditions, and policy</a> (*)</label>
        </div>
        <button class="font-rale font-size-20 color-primary-bg auth-btn" name="register_submit" type="submit">Register</button>
    </form>
    <!-- !Register Form -->
</section>
<!-- !register section -->