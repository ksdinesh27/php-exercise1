<?php
namespace Db;

use mysqli;

class MysqliDb implements DbDriver {


    private $conn = null;

    
    public function __construct() {
        $this->conn = new mysqli(self::serverName, self::username, self::password, self::dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function close()
    {
        $this->conn->close();
    }

    public function execute(string $sql, array $arguments = null) {
        $statement = $this->conn->prepare($sql);
        if ($statement === false) {
            die("Error: " . $sql . "<br>" . $this->getError());
        }
        if($arguments){
            $argTypes = "";
            foreach($arguments as $arg){
                $argTypes .= $this->getArgType($arg);
            }
            $bindArgs = array_merge([$argTypes], $arguments);
            call_user_func_array([$statement, 'bind_param'], $bindArgs);
        }
        $ok = $statement->execute();
        if(!$ok){
            throw new Exception("Error: " . $sql . "\n" . $this->db->getError());
        }
        return $statement;
    }

    public function select(string $sql, array $arguments = null) {
        $statement = $this->execute($sql, $arguments);
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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
