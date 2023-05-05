<?php

  session_start();

  $currentUser = array();

  if(isset($_SESSION['user_id'])){
    $currentUser = $User->getUserInfo($_SESSION['user_id']);
  }

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
<h1>Login</h1>
<p>Need an account? <a href="#">Create Account</a></p>

    <!-- Login Form -->
    <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">
        <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" placeholder="Email" id="email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <small id="confirm_error"></small>
        <button name="login_submit" type="submit">Login</button>
    </form>
    <!-- !Login Form -->
    <h2><?php echo isset($currentUser['first_name']) ? $currentUser['first_name'] : 'Unknown'; ?></h2>
</section>
<!-- !Login Section -->