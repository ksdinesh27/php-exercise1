<?php
require_once 'Db.php';
require_once 'display.php';


/**
 * Description of LogController
 *
 * @author livares
 */
class LogController {
    
    function __construct(){
        $this->db = new PDO_db();
    }
    
    function insert(){
        date_default_timezone_set('America/Chicago');
        $lcl_machine = $_GET['date'];
        $srvr_machine = date("d/m/Y") . " " . date("h:i:s");
        $localIP = $_SERVER['REMOTE_ADDR'];
        $this->db->insert($localIP, $lcl_machine, $srvr_machine);
        $this->db->close();
    }
    
    function show(){
        $logs = $this->db->select();
        $disp_obj = new Display();
        $disp_obj->log($logs);
        $this->db->close();
    }
}
