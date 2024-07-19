<?php
require_once '../SignUP/User.php'; // Adjust the path as per your file structure

$user = new User();

if (isset($_POST['submit'])) {
    $RefNo = $user->generateRefNo();
    $FullName = $_POST["fullname"];
    $Contact = $_POST["contact"];
    $NIC = $_POST["nic"];
    $BirthDate = $_POST["birthdate"];
    $Gender = $_POST["gender"];
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    // Call signUp method to insert data
    $result = $user->signUp($RefNo, $FullName, $Contact, $NIC, $BirthDate, $Gender, $Username, $Password);

    if ($result) {
        echo "<script> window.alert('Sign-in successful'); window.location='../Login/Login.php';</script>";
    } else {
        echo "Failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign_up.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="header-title">TechWizards Solutions</h1>
            <nav class="header-nav">
                <ul>
                <li><a href="../Website/Website.php">Home</a></li>
                <li><a href="../Login/Login.php">Login</a></li>
                <li><a href="../SignUP/index.php">Add User</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <form method="POST">
            <div class="container">
                <div class="first">
                    <label>Ref No:</label>
                    <input type="text" name="refno" value="<?php echo htmlspecialchars($user->generateRefNo()); ?>" readonly>
                    <br>
                    <br>
                    <label>Full Name:</label>
                    <input type="text" name="fullname" placeholder="Enter Full Name" required>
                    <br>
                    <br>
                    <label>Contact No:</label>
                    <input type="text" name="contact" placeholder="Enter Contact" required>
                    <br>
                    <br>
                    <label>NIC:</label>
                    <input type="text" name="nic" placeholder="Enter NIC No." required>
                </div>
                <div class="second">
                    <label>Birth Date:</label>
                    <input type="date" name="birthdate" required>
                    <br>
                    <br>
                    <label>Gender:</label>
                    <input type="text" name="gender" placeholder="Enter Gender" required>
                    <br>
                    <br>
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Enter Username" required>
                    <br>
                    <br>
                    <label>Password:</label>
                    <input type="text" name="password" placeholder="Enter Password" required>
                </div>
            </div>
            <div class="submit-btn">
                <input type="submit" value="submit" name="submit">
            </div>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 User Management System. All rights reserved.</p>
    </footer>
</body>
</html>
