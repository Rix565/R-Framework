<?php
//Map your routes there.

$router->map('GET', '/', 'pages/home.php');
$router->map('GET|POST', '/login', 'pages/login.php');
$router->map('GET|POST', '/signup', 'pages/signup.php');
$router->map('GET', '/logout', 'special/logout.php');