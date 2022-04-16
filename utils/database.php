<?php
class Database{
    public function init_session(){
        session_start();
    }
    public function connect(){
        //swaggish
        require_once "./config.php";
        try {
            $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME , USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Could not connect to the database server. Send this information to an administrator: " . $e->getMessage());
            exit;
        }
        return $db;
    }
}
?>