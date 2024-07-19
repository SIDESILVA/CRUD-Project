<?php
session_start();
require_once '../Crud/User.php'; // Adjust the path as per your file structure

$userObj = new User();

// Check if there's data in session for editing
if (!isset($_SESSION['edit_data'])) {
    echo "No data to edit.";
    exit();
}

// Retrieve data from session and clear it
$row_edit = $_SESSION['edit_data'];

$updateStatus = null;

// Check if form is submitted for update
if (isset($_POST['update'])) {
    $RefNo = $_POST['refno']; // Get reference number from hidden input
    $FullName = $_POST['fullname'];
    $Contact = $_POST['contact'];
    $NIC = $_POST['nic'];
    $BirthDate = $_POST['birthdate'];
    $Gender = $_POST['gender'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Perform update operation
    $updateStatus = $userObj->updateUser($RefNo, $FullName, $Contact, $NIC, $BirthDate, $Gender, $Username, $Password);

    // Redirect back to CRUD.php after update
    if ($updateStatus) {
        echo "<script>window.alert('Data edited successfully.'); window.location.href = 'CRUD.php';</script>";
        exit();
    } else {
        echo "<script>window.alert('Error editing data.'); window.location.href = 'CRUD.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h3>Edit Record</h3>
    <form method="POST">
        <input type="hidden" name="refno" value="<?php echo htmlspecialchars($row_edit['RefNo']); ?>">
        <label>Ref No:</label>
        <input type="text" name="refno_value" value="<?php echo htmlspecialchars($row_edit['RefNo'] ?? ''); ?>" readonly>
        <br><br>
        <label>Full Name:</label>
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($row_edit['FullName'] ?? ''); ?>" required>
        <br><br>
        <label>Contact No:</label>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($row_edit['Contact'] ?? ''); ?>" required>
        <br><br>
        <label>NIC:</label>
        <input type="text" name="nic" value="<?php echo htmlspecialchars($row_edit['NIC'] ?? ''); ?>" required>
        <br><br>
        <label>Birth Date:</label>
        <input type="date" name="birthdate" value="<?php echo htmlspecialchars($row_edit['BirthDate'] ?? ''); ?>" required>
        <br><br>
        <label>Gender:</label>
        <input type="text" name="gender" value="<?php echo htmlspecialchars($row_edit['Gender'] ?? ''); ?>" required>
        <br><br>
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($row_edit['Username'] ?? ''); ?>" required>
        <br><br>
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($row_edit['Password'] ?? ''); ?>" required>
        <br><br>
        <input type="submit" value="Update" name="update">
    </form>
</body>
</html>
