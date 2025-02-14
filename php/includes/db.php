<?php
class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $config = parse_ini_file('config/config.ini');
        if (!$config) {
            die("Failed to load configuration file.");
        }
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connection successful!"; // Debugging line
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>