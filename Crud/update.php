<?php
require_once '../Database/connection.php';

if (isset($_POST['update'])) {
    // Ensure 'refno' is present in the POST request
    if (!isset($_POST['refno']) || empty($_POST['refno'])) {
        echo "<script>window.alert('Reference number is missing.'); window.location='CRUD.php';</script>";
        exit();
    }

    // Extract data from POST
    $refno = $_POST['refno'];
    $FullName = $_POST['fullname'];
    $Contact = $_POST['contact'];
    $NIC = $_POST['nic'];
    $BirthDate = $_POST['birthdate'];
    $Gender = $_POST['gender'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Debugging: Echo extracted data to check values
    echo "RefNo: $refno<br>";
    echo "FullName: $FullName<br>";
    echo "Contact: $Contact<br>";
    echo "NIC: $NIC<br>";
    echo "BirthDate: $BirthDate<br>";
    echo "Gender: $Gender<br>";
    echo "Username: $Username<br>";
    echo "Password: $Password<br>";

    // Prepare and bind parameters for update query to prevent SQL injection
    $sql_update = "UPDATE `signup` SET 
        `fullname` = ?, 
        `contact` = ?, 
        `nic` = ?, 
        `birthdate` = ?, 
        `gender` = ?, 
        `username` = ?, 
        `password` = ?
        WHERE `refno` = ?";

    // Create a prepared statement
    $stmt = $con->prepare($sql_update);

    if (!$stmt) {
        // Handle prepare error
        echo "<script>window.alert('Prepare failed: " . $con->error . "'); window.location='CRUD.php';</script>";
        exit();
    }

    // Bind parameters
    $stmt->bind_param("sssssssi", $FullName, $Contact, $NIC, $BirthDate, $Gender, $Username, $Password, $refno);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<script>window.alert('Update successful.'); window.location='CRUD.php';</script>";
        } else {
            echo "<script>window.alert('No records updated.'); window.location='CRUD.php';</script>";
        }
    } else {
        echo "<script>window.alert('Error updating record: " . $stmt->error . "'); window.location='CRUD.php';</script>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<script>window.alert('Invalid request.'); window.location='CRUD.php';</script>";
    exit();
}

// Close the connection
$con->close();
?>
