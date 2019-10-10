<?php
require_once "DbDriver.php";

class MysqliDb implements DbDriver {

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
//    
//    function insert() {
//        $db = $this;
//
//    }
//
//    function select() {
//        $db = $this;
//        
//
//    }
    
    public function close()
    {
        $this->conn->close();
    }

    public function query(string $sql, array $arguments = null) {
        $statement = $this->conn->prepare($sql);
        if($arguments){
            $argTypes = "";
            foreach($arguments as $arg){
                $argTypes .= $this->getArgType($arg);
            }
            $bindArgs = array_merge([$argTypes], $arguments);
            \call_user_func_array([$statement, 'bind_param'], $bindArgs);
        }
        return $statement->execute();
    }
    
    private function getArgType($arg) {
        $type = gettype($arg);
        switch($type) {
            case 'boolean':
            case 'integer':
                return 'i';

            case 'double':
                return 'd';

            case 'string':
            case 'NULL':
            case 'unknown type':
                return 's';
        }
    }
    
    public function getError(): string {
        return $this->conn->error;
    }

}
