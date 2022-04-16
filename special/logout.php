<?php
require_once "./classes/database.php";
$dbClass = new Database;
$dbClass->init_session();
session_unset();
header("Location: /");