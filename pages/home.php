<?php
require_once "./utils/database.php";
require_once "./database/user.php";
$dbClass = new Database;
$dbClass->init_session();
$conn =  $dbClass->connect();
$userClass = new User;
//metadata needed for header
$title = "Some page";
require_once "elements/header.php";
?>
<h1 class="mt-4 ms-5">Some page</h1>
</main>
<?php
require_once "elements/footer.php";
?>
