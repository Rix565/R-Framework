<?php
require_once "./utils/database.php";
require_once "./database/user.php";
$dbClass = new Database;
$dbClass->init_session();
$conn =  $dbClass->connect();
//metadata needed for header
$title = "Sign up";
require_once "elements/header-form.php";
if(isset($_SESSION['token'])){
    header("Location: /");
}
?>
<body class="text-center">    
<main class="form-signin">
  <form method="post">
    <h1 class="h1 mb-3 fw-normal">Example</h1>
    <h1 class="h3 mb-3 fw-normal">Sign Up to (insert thing).</h1>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Example123">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022 Rixy Studios</p>
    <a class="mt-5 mb-3 text-muted" href="/login">Already have an account?</a>
  </form>
  <?php
  if(isset($_POST['submit'])){
      if(!empty($_POST['username']) && !empty($_POST['password'])){
          if($_POST['password']!="123" || $_POST['password']!="password" || $_POST['password']!="password123"){
              $userClass = new User;
              $check = $userClass->getUserFromUsername($conn, $_POST['username']);
              if(empty($check)){
                  $hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                  $userClass->createUser($conn, $_POST['username'], $hashpass);
                  header("Location: /login");
              }else{
                  echo "<p style='color: var(--bs-red,red);'>sorry, an account already exist with that username.</p>";
              }
          }else{
              echo "<p style='color: var(--bs-red,red);'>your password is too weak.</p>";
          }
      }else{
          echo "<p style='color: var(--bs-red,red);'>it seems the form you sended is incorrect, check all the fields and try again</p>";
      }
  }?>
</main>
</body>