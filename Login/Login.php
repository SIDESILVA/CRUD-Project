<?php
require_once '../Login/User.php'; // Adjust the path as per your file structure

$user = new User();

if(isset($_POST['login'])) {
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    // Call authenticate method to check credentials
    if ($user->authenticate($Username, $Password)) {
        echo "<script> window.alert('Login successful'); window.location='../CRUD/CRUD.php';</script>";
    } else {
        echo "<script> window.alert('Invalid Username or Password'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form method="POST">
        <h2>LOGIN</h2>
        <div class="container">
            <div class="first">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter Username" required>
                <br><br>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
        </div>
        <div class="submit-btn">
            <input type="submit" value="Login" name="login">
        </div>
        <a href="../Signup/index.php" class="signup-btn">Signup</a>
    </form>
</body>
</html>
