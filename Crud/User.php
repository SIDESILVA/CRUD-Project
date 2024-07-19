<?php
require_once '../Database/connection.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    public function getAllUsers() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM signup";
        $result = $conn->query($sql);
        $users = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function searchUsers($searchTerm) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM signup WHERE refno LIKE ? OR fullname LIKE ? OR contact LIKE ? OR nic LIKE ?";
        $stmt = $conn->prepare($sql);
        $likeSearchTerm = "%".$searchTerm."%";
        $stmt->bind_param("ssss", $likeSearchTerm, $likeSearchTerm, $likeSearchTerm, $likeSearchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function deleteUser($refno) {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM signup WHERE refno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $refno);
        
        return $stmt->execute();
    }

    public function updateUser($refno, $fullname, $contact, $nic, $birthdate, $gender, $username, $password) {
        $conn = $this->db->getConnection();
        $sql = "UPDATE signup SET fullname=?, contact=?, nic=?, birthdate=?, gender=?, username=?, password=? WHERE refno=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $fullname, $contact, $nic, $birthdate, $gender, $username, $password, $refno);
        
        return $stmt->execute();
    }

    public function getUserByRefNo($refno) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM signup WHERE refno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $refno);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function addUser($refno, $fullname, $contact, $nic, $birthdate, $gender, $username, $password) {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO signup (refno, fullname, contact, nic, birthdate, gender, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $refno, $fullname, $contact, $nic, $birthdate, $gender, $username, $password);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function closeConnection() {
        $this->db->closeConnection();
    }
}
?>
