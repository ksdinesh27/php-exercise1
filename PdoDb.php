<?php
require_once "DbDriver.php";


class PdoDb implements DbDriver {

    private $serverName = "localhost";
    private $username = "root";
    private $password = "123456";
    private $dbname = "time_App";
    private $conn = null;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=" . $this->serverName . ";dbname=" . $this->dbname, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function insert($localIP, $localTimestamp, $serverTimestamp) {
        $sql = "INSERT INTO time_log (ip_address, lcl_date_time, srvr_date_time)"
                . "VALUES (?,?,?)";
        $this->query($sql, [&$localIP, &$localTimestamp, &$serverTimestamp]);
        if ($result) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    function select() {
        $sql = "SELECT ip_address,lcl_date_time,srvr_date_time from time_log";
        $result = $this->conn->query($sql);
        return $result;
    }

    function close() {
        $this->conn = null;
    }

    public function query(string $sql, array $arguments) {
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $localIP);
        $stmt->bindParam(2, $localTimestamp);
        $stmt->bindParam(3, $serverTimestamp);
        $result = $stmt->execute();
    }

    public function getError(): string {
        
    }

}
