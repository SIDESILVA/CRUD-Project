<?php
session_start();
require_once '../Crud/User.php';

$userObj = new User();

if (isset($_GET['delete'])) {
    $refno = $_GET['delete'];

    if ($userObj->deleteUser($refno)) {
        echo "Record deleted successfully.";
        header("Location: CRUD.php");
        exit();
    } else {
        echo "Error deleting record.";
    }
}

if (isset($_GET['edit'])) {
    $refno = $_GET['edit'];
    $userData = $userObj->getUserByRefNo($refno);
    if ($userData) {
        $_SESSION['edit_data'] = $userData;
        header("Location: edit.php");
        exit();
    } else {
        echo "User not found.";
    }
}

$users = [];

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $users = $userObj->searchUsers($searchTerm);
} else {
    $users = $userObj->getAllUsers();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="crud-header">
        <h2 class="crud-heading">CRUD Operations</h2>
        <a href="../SignUp/index.php" class="btn btn-primary">Add User</a>
    </div>
    <div class="search-bar">
        <form method="GET" action="CRUD.php">
            <input type="text" name="search" placeholder="Enter data" class="search-input">
            <button type="submit" class="btn btn-search">Search</button>
            <a href="CRUD.php" class="btn btn-back">Back</a>
        </form>
    </div>
    <table class="crud-table" border="1">
        <thead>
            <tr>
                <th>Ref No</th>
                <th>Full Name</th>
                <th>Contact</th>
                <th>NIC</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['RefNo']); ?></td>
                <td><?php echo htmlspecialchars($user['FullName']); ?></td>
                <td><?php echo htmlspecialchars($user['Contact']); ?></td>
                <td><?php echo htmlspecialchars($user['NIC']); ?></td>
                <td><?php echo htmlspecialchars($user['BirthDate']); ?></td>
                <td><?php echo htmlspecialchars($user['Gender']); ?></td>
                <td><?php echo htmlspecialchars($user['Username']); ?></td>
                <td><?php echo htmlspecialchars($user['Password']); ?></td>
                <td>
                    <a href="CRUD.php?edit=<?php echo htmlspecialchars($user['RefNo']); ?>">
                        <button type="button" class="btn btn-edit">Edit</button>
                    </a>
                    <a href="CRUD.php?delete=<?php echo htmlspecialchars($user['RefNo']); ?>">
                        <button type="button" class="btn btn-delete">Delete</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$userObj->closeConnection(); // Close the database connection after use
?>
