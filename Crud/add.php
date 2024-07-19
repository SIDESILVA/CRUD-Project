<?php
include '../Crud/User.php';

$userObj = new User();

if (isset($_POST['add'])) {
    $RefNo  = $_POST["refno"];
    $FullName = $_POST["fullname"];
    $Contact = $_POST["contact"];
    $NIC = $_POST["nic"];
    $BirthDate = $_POST["birthdate"];
    $Gender = $_POST["gender"];
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    if ($userObj->addUser($RefNo, $FullName, $Contact, $NIC, $BirthDate, $Gender, $Username, $Password)) {
        echo "<script> window.alert('Record added successfully'); window.location='CRUD.php';</script>";
    } else {
        echo "Error adding record: " . mysqli_error($con);
    }
}
?>
