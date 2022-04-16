<?php
require_once "./utils/database.php";
require_once "./database/user.php";
$dbClass = new Database;
$dbClass->init_session();
$conn =  $dbClass->connect();
$userClass = new User;
//metadata needed for header
$title = "404";
require_once "elements/header.php";
?>
<h1 class="text-center">oh no</h1>
<p class="text-center">seems like you got lost</p>
</main>
<?php
require_once "elements/footer.php";
?>