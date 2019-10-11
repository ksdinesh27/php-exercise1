<?php
namespace Db;

use PDO;

class PdoDb implements DbDriver {

    private $conn = null;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=" . self::serverName . ";dbname=" . self::dbname, self::username, self::password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function close() {
        $this->conn = null;
    }

    public function getError(): string {
        return $this->conn->error;
    }

    public function execute(string $sql, array $arguments = null) {
        $statement = $this->conn->prepare($sql);
        if ($statement === false) {
            die("Error: " . $sql . "<br>" . $this->getError());
        }

        if ($arguments) {
            foreach ($arguments as $index => &$arg) {
                $statement->bindParam($index+1, $arg);
            }
        }
        $ok = $statement->execute();
        if (!$ok) {
            throw new Exception("Error: " . $sql . "\n" . $this->db->getError());
        }
        return $statement;
    }

//    function select() {
//        $sql = "SELECT ip_address,lcl_date_time,srvr_date_time from time_log";
//        $result = $this->conn->query($sql);
//        return $result;
//    }

    public function select(string $sql, array $arguments = null) {

        $result = $this->execute($sql);
        return $result;
    }

}
