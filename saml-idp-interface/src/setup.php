<?
require_once(dirname(__FILE__)."/db.php");

$create_users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
    );";

if($conn->query($create_users_table) == FALSE) {
    die("Failed to create table: $conn->error");
}
?>