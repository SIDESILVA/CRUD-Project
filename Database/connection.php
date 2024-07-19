<?php
class DatabaseConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'assignment_crud';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function executeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function prepareStatement($sql) {
        return $this->conn->prepare($sql);
    }

    public function escapeString($str) {
        return $this->conn->real_escape_string($str);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
