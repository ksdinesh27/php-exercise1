<?php
require_once "DbDriver.php";
require_once 'MysqliDb.php';

/**
 * Description of Log
 *
 * @author livares
 */
class Log {
    
    public function __construct(DbDriver $db) {
        $this->db = $db;
    }
    
    function insert($localIP, $localTimestamp, $serverTimestamp) {
        $sql = "INSERT INTO time_log (ip_address, lcl_date_time, srvr_date_time)"
                . "VALUES (?,?,?)";
        
        $result = $this->db->query($sql, [&$localIP, &$localTimestamp, &$serverTimestamp]);
        
        if ($result) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->getError();
        }
    }
    
    function all() {
        $sql = "SELECT ip_address,lcl_date_time,srvr_date_time from time_log";
        $result = $this->db->query($sql);
        return $result;
    }
}
