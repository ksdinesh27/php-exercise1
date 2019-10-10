<?php

class Db {

    private $serverName = "localhost";
    private $username = "root";
    private $password = "123456";
    private $dbname = "time_App";
    private $conn = null;

    
    public function __construct() {
        $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    function insert($localIP, $localTimestamp, $serverTimestamp) {
        $sql = "INSERT INTO time_log (ip_address, lcl_date_time, srvr_date_time)"
                . "VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $localIP, $localTimestamp, $serverTimestamp);
        
        if ($stmt->execute()) {
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
    
    function close()
    {
        $this->conn->close();
    }

}
