<?php 
echo "Hello PHP\n";

define("DB_HOST", "idp-db")
define("DB_USER", "idp-user")
define("DB_PASS", "password")

$conn = new mysqli($host, $user, $pass);
if($conn->connect_error) {
    die("Failed to connect to DB: ".conn->connect_error)
} else {
    echo "Connected to database."
}

echo "Ready to serve!";

?>

