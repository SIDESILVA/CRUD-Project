<?php
require_once '../Database/Connection.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    // Generate unique RefNo
    public function generateRefNo() {
        $microtime = microtime(true);
        $milliseconds = round(($microtime - floor($microtime)) * 1000);
        $yearLastTwoDigits = date('y');
        $datePart = date('mdHis');
        

        // Remove leading zeros for month and day
        $datePart = ltrim($datePart, '0');

        return $yearLastTwoDigits . $datePart . $milliseconds;
    }

    // Method to insert user data into database
    public function signUp($refno, $fullname, $contact, $nic, $birthdate, $gender, $username, $password) {
        // Escape input data
        $refno = $this->db->escapeString($refno);
        $fullname = $this->db->escapeString($fullname);
        $contact = $this->db->escapeString($contact);
        $nic = $this->db->escapeString($nic);
        $birthdate = $this->db->escapeString($birthdate);
        $gender = $this->db->escapeString($gender);
        $username = $this->db->escapeString($username);
        $password = $this->db->escapeString($password);

        // SQL query to insert data
        $sql = "INSERT INTO `signup`(`refno`, `fullname`, `contact`, `nic`, `birthdate`, `gender`, `username`, `password`) 
                VALUES ('$refno', '$fullname', '$contact', '$nic', '$birthdate', '$gender', '$username', '$password')";

        // Execute SQL query
        $result = $this->db->executeQuery($sql);

        return $result;
    }
}
?>
