<?php

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['login_submit'])){
      // call method loginUser
      $Login->loginUser($_POST);
    }
  }
?>

<!-- Login Section -->
<section id="login">
<h1 class="font-mont font-size-xl color-primary">Login</h1>
<p class="font-roboto font-size-20 header-txt">Need an account? <a href="#">Create Account</a></p>

    <!-- Login Form -->
    <form
      action="login.php"
      method="post"
      enctype="multipart/form-data"
      id="log-form"
    >
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
        <small id="confirm_error"></small>
        <button
          name="login_submit"
          type="submit"
          class="font-rale font-size-20 color-primary-bg auth-btn"
        >
          Login
        </button>
    </form>
    <!-- !Login Form -->
</section>
<!-- !Login Section -->