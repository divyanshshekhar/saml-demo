<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once(dirname(__FILE__)."/db.php");

    $user = $_POST["username"];
    $password = $_POST["password"];
    $get_user_query = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    $get_user_result = $conn->query($get_user_query);
    if(!$get_user_result || $get_user_result->num_rows <= 0) {
        die("Invalid credentials");
    }
    $user = $get_user_result->fetch_assoc()['username'];
    echo "Welcome user {$user}";
}

?>
<html>
<head>
    <title>SAML IDP: Login</title>
</head>
<body>
<?php include(dirname(__FILE__)."/header.php") ?>
    <form action="" method="POST" >
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="username"/><br/>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="password"/><br/>
        <input type="submit" name="submit" value="Login"/><br/>
    </form>
</body>
</html>
