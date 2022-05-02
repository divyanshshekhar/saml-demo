<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once(dirname(__FILE__)."/db.php");

    $user = $_POST["username"];
    $password = $_POST["password"];
    $save_query = "INSERT INTO users(username, password) VALUES('$user', '$password')";
    if($conn->query($save_query) == TRUE) {
        echo "Saved user";
    } else {
        echo "Errr saving user: {$conn->error}";
    }
}

?>
<html>
<head>
    <title>SAML IDP: Signup</title>
</head>
<body>
    <?php include(dirname(__FILE__)."/header.php") ?>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="username"/><br/>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="password"/><br/>
        <input type="submit" name="submit" value="Signup"/><br/>
    </form>
</body>
</html>
