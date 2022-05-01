<?
const DB_HOST = "sp-db";
const DB_USER = "sp-user";
const DB_PASS = "password";
const DB_NAME = "sp-db";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($conn->connect_error) {
    die("Failed to connect to DB: {$conn->connect_error}");
}
?>