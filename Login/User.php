<?php
require_once '../Database/connection.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    // Method to authenticate user
    public function authenticate($username, $password) {
        $username = $this->db->escapeString($username);
        $password = $this->db->escapeString($password);

        $sql = "SELECT * FROM `signup` WHERE `username`='$username' AND `password`='$password'";
        $result = $this->db->executeQuery($sql);

        if ($result->num_rows > 0) {
            return true; // User exists and credentials are correct
        } else {
            return false; // User does not exist or credentials are incorrect
        }
    }
}
?>
