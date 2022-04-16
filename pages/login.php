<?php
require_once "./utils/database.php";
require_once "./database/user.php";
require_once "./utils/utils.php";
$dbClass = new Database;
$dbClass->init_session();
$conn =  $dbClass->connect();
//metadata needed for header
$title = "Login";
require_once "elements/header-form.php";
if(isset($_SESSION['token'])){
    header("Location: /");
}
?>
<body class="text-center">    
<main class="form-signin">
  <form method="post">
    <h1 class="h1 mb-3 fw-normal">Example</h1>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Example123">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022 Rixy Studios</p>
    <a class="mt-5 mb-3 text-muted" href="/signup">Don't have an account?</a>
  </form>
  <?php
  if(isset($_POST['submit'])){
      if(!empty($_POST['username']) && !empty($_POST['password'])){
          $userClass = new User;
          $utilsClass = new Utils;
          $loginStatus = $userClass->login($conn, $utilsClass, $_POST['username'], $_POST['password']);
          if($loginStatus=="OK"){
              header("Location: /");
          }elseif($loginStatus=="INVALID_USER"){
              echo "<p style='color: var(--bs-red,red);'>invalid user/password</p>";
          }elseif($loginStatus=="INVALID_PASSWORD"){
              echo "<p style='color: var(--bs-red,red);'>invalid user/password</p>";
          }
      }else{
          echo "<p style='color: var(--bs-red,red);'>it seems the form you sended is incorrect, check all the fields and try again</p>";
      }
  }
?>
</main>
</body>