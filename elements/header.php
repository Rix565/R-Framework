<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    exit("Get a mother");
}
if(!isset($conn)){
    exit("This element needs the conn variable.");
}
if(!isset($userClass)){
    exit("This element needs the user class.");
}
if(isset($_SESSION['token'])){
    $user = $userClass->getUserFromToken($conn, $_SESSION['token']);
}
?>
<html>
<head>
    <title><?php if(isset($title)){echo $title. " - Example";}else{echo "Example";} ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
    

    </style>
</head>
<body>
<main>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-white">Example</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
        </li>
      </ul>
      <?php if(!isset($_SESSION['token'])){ ?>
      <a href='/login' class="btn btn-outline-success" >Login</a>
      <?php }else{ ?>
      <div class="nav-item dropstart">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user['username'] ?></a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="/logout">Log out</a></li>
        </ul>
     </div>
      <?php } ?>
    </div>
  </div>
</nav>